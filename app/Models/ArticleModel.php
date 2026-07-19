<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'slug', 'konten', 'status'];
    protected $useTimestamps = 'true';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'judul' => 'required|min_length[5]|max_length[255]',
        'slug' => 'permit_empty|alpha_dash|min_length[3]|max_length[255]',
        'konten' => 'required|min_length[10]',
        'status' => 'required|in_list[draft,published]',
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul wajib diisi.',
            'min_length' => 'Judul minimal 5 karakter.',
            'max_length' => 'Judul terlalu panjang.',
        ],
        'slug' => [
            'alpha_dash' => 'Slug hanya boleh berisi huruf, angka, tanda hubung, dan garis bawah.',
            'min_length' => 'Slug minimal 3 karakter.',
        ],
        'konten' => [
            'required' => 'Konten wajib diisi.',
            'min_length' => 'Konten minimal 10 karakter.',
        ],
        'status' => [
            'required' => 'Status wajib dipilih.',
            'in_list' => 'Status harus draft atau published.',
        ],
    ];
}
