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


    function merge($left, $right, $key)
    {
        $result = array();
        while (count($left) > 0 && count($right) > 0) {
            if ($left[0][$key] < $right[0][$key]) {
                $result[] = array_shift($left);
            } else {
                $result[] = array_shift($right);
            }
        }

        return array_merge($result, $left, $right);
    }

    function mergeSort($array, $key)
    {
        if (count($array) <= 1) {
            return $array;
        }

        $middle = count($array) / 2;
        $left = array_slice($array, 0, $middle);
        $right = array_slice($array, $middle);

        $left = $this->mergeSort($left, $key);
        $right = $this->mergeSort($right, $key);

        return $this->merge($left, $right, $key);
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getIdUser());
        $field = $this->repository->showById($input->getIdUser());
        $fieldOrganized = $this->mergeSort($field, "id");
        echo $fieldOrganized;
        return new OutputBoundary([]);
    }
}
