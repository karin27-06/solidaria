<?php


namespace App\Actions\Pipelines;

use App\Models\Laboratory;
use App\Pipelines\FilterByDate;
use App\Pipelines\FilterByName;
use Illuminate\Pipeline\Pipeline;

class Filter
{

  // function for filter by name and date
  public function execute(array $filters)
  {
    return app(Pipeline::class)
      ->send(Laboratory::query())
      ->through($filters ?: [
        FilterByName::class,
        FilterByDate::class,
      ])
      ->thenReturn()->paginate(5);
  }
}
