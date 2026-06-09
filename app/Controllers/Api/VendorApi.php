<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\VendorModel;


class VendorApi extends BaseController
{

    public function index()
    {
        $model = new VendorModel();
        $data = $model->findAll();

        foreach ($data as &$vendor) {
            // Format profile photo
            if (!empty($vendor['foto'])) {
                if (str_starts_with($vendor['foto'], 'http')) {
                    // Already absolute URL
                } else if (file_exists(FCPATH . 'uploads/' . $vendor['foto'])) {
                    $vendor['foto'] = base_url('uploads/' . $vendor['foto']);
                } else {
                    $vendor['foto'] = base_url('images/' . $vendor['foto']);
                }
            }

            // Format wedding reference photo
            if (!empty($vendor['wedding_reference_foto'])) {
                if (str_starts_with($vendor['wedding_reference_foto'], 'http')) {
                    // Already absolute URL
                } else {
                    $refPhotos = explode(',', $vendor['wedding_reference_foto']);
                    $formattedRefPhotos = [];
                    foreach ($refPhotos as $photo) {
                        $photo = trim($photo);
                        if (!empty($photo)) {
                            if (file_exists(FCPATH . 'uploads/reference/' . $photo)) {
                                $formattedRefPhotos[] = base_url('uploads/reference/' . $photo);
                            } else {
                                $formattedRefPhotos[] = base_url('images/' . $photo);
                            }
                        }
                    }
                    $vendor['wedding_reference_foto'] = implode(',', $formattedRefPhotos);
                }
            }

            // Format trend photo
            if (!empty($vendor['trend_foto'])) {
                if (str_starts_with($vendor['trend_foto'], 'http')) {
                    // Already absolute URL
                } else if (file_exists(FCPATH . 'uploads/trend/' . $vendor['trend_foto'])) {
                    $vendor['trend_foto'] = base_url('uploads/trend/' . $vendor['trend_foto']);
                } else {
                    $vendor['trend_foto'] = base_url('images/' . $vendor['trend_foto']);
                }
            }
        }

        return $this->response->setJSON($data);
    }

}