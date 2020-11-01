<?php


    namespace App\Repositories;


    use App\Models\User;

    class UsersRepository extends \Prettus\Repository\Eloquent\BaseRepository
    {

        /**
         * @inheritDoc
         */
        public function model()
        {
            return User::class;
        }
    }
