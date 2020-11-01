<?php


    namespace App\Repositories\Criterias;


    use phpDocumentor\Reflection\Types\Integer;
    use Prettus\Repository\Contracts\CriteriaInterface;
    use Prettus\Repository\Contracts\RepositoryInterface;

    class CustomerTasksCriteria implements CriteriaInterface
    {
        protected $authorId;

        /**
         * CustomerTasksCriteria constructor.
         *
         * @param  Integer  $authorId
         */
        public function __construct(int $authorId)
        {
            $this->authorId = $authorId;
        }

        /**
         * @param $model
         * @param  RepositoryInterface  $repository
         *
         * @return mixed
         */
        public function apply($model, RepositoryInterface $repository)
        {
            $model = $model->where('author_id', $this->authorId);

            return $model;
        }
    }
