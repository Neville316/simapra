<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            static::logModelActivity($model, 'created', 'Menambahkan data ' . class_basename($model));
        });

        static::updated(function ($model) {
            static::logModelActivity($model, 'updated', 'Mengubah data ' . class_basename($model), [
                'old' => $model->getOriginal(),
                'new' => $model->getChanges(),
            ]);
        });

        static::deleted(function ($model) {
            static::logModelActivity($model, 'deleted', 'Menghapus data ' . class_basename($model));
        });
    }

    protected static function logModelActivity($model, $action, $description, $properties = null)
    {
        if (Auth::check()) {
            Auth::user()->logActivity($action, $description, $model, $properties);
        }
    }
}
