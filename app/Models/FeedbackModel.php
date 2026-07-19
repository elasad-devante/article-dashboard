<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'pesan'];
    protected $useTimestamps = false;

    protected $validationRules = [
        'nama' => 'required|min_length[3]',
        'email' => 'required|valid_email',
        'pesan' => 'required|min_length[5]'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'Nama wajib diisi.',
            'min_length' => 'Nama minimal 3 karakter.'
        ],
        'email' => [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.'
        ],
        'pesan' => [
            'required' => 'Pesan wajib diisi.',
            'min_length' => 'Pesan minimal 5 karakter.'
        ]
    ];
}
