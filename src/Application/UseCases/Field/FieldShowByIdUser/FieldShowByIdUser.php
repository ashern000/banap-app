<?php

declare(strict_types=1);

namespace src\Application\UseCases\Field\FieldShowByIdUser;

use src\Domain\Repositories\FieldRepositories\ShowByIdUserRepository;
use src\Application\Contracts\SessionValidator;

final class FieldShowByIdUser
{
    private ShowByIdUserRepository $repository;
    private SessionValidator $session;

    public function __construct(ShowByIdUserRepository $repository, SessionValidator $session)
    {
        $this->repository = $repository;
        $this->session = $session;
    }


    private function mergeSortById($array)
    {
        if (count($array) <= 1) {
            return $array;
        }

        $middle = floor(count($array) / 2);
        $left = array_slice($array, 0, (int)$middle);
        $right = array_slice($array, (int)$middle);

        $left = $this->mergeSortById($left);
        $right = $this->mergeSortById($right);

        return $this->merge($left, $right);
    }

    private function merge($left, $right)
    {
        $result = [];
        $leftIndex = 0;
        $rightIndex = 0;

        while ($leftIndex < count($left) && $rightIndex < count($right)) {
            if ((int)$left[$leftIndex]["id"] < (int)$right[$rightIndex]["id"]) {
                $result[] = $left[$leftIndex];
                $leftIndex++;
            } else {
                $result[] = $right[$rightIndex];
                $rightIndex++;
            }
        }
        
        while ($leftIndex < count($left)) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        }

        while ($rightIndex < count($right)) {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }

        return $result;
    }


    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getIdUser());
        $field = $this->repository->showById($input->getIdUser());
        $field = $this->mergeSortById($field);

        return new OutputBoundary([$field]);
    }
}
