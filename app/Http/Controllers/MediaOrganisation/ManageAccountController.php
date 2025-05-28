<?php

namespace App\Http\Controllers\MediaOrganisation;

use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use App\Models\MediaOrganization;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManageAccountController extends Controller
{

    public function updateDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'fullname' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'position' => 'required|string|max:255',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed in updateDetails', [
                    'errors' => $validator->errors(),
                    'user_id' => Auth::id()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->only(['fullname', 'phone', 'email', 'position']);

            // Initialize Cloudinary
            $cloudinary = new Cloudinary();
            $uploadApi = $uploadApi ?? $cloudinary->uploadApi();

            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('profile_picture')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/profile',
                        'transformation' => [
                            'width' => 300,
                            'height' => 300,
                            'crop' => 'thumb',
                            'gravity' => 'face',
                        ],
                    ]
                );

                $data['profile_picture_url'] = $uploadResult['secure_url'] ?? null;
                $data['profile_picture_public_id'] = $uploadResult['public_id'] ?? null;
            }

            $details = MediaOrganization::updateOrCreate(
                ['user_id' => Auth::id()],
                $data
            );

            Log::info('Media manager details updated', ['user_id' => Auth::id()]);

            return response()->json([
                'success' => true,
                'message' => 'Details saved successfully.',
                'data' => $details
            ]);
        } catch (\Exception $e) {
            Log::error('Error in updateDetails: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'exception' => $e
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving your details.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function updatetvDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'tv_type' => 'required|string|max:255',
                'tv_name' => 'required|string|max:255',
                'tv_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'tv_main_studio_location' => 'required|string|max:255',
                'tv_content_focus' => 'required|string|max:255',
                'tv_target_audience' => 'required|string|max:255',
                'tv_advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:5120',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed in updatetvDetails', [
                    'errors' => $validator->errors(),
                    'user_id' => Auth::id()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except(['tv_logo', 'tv_advert_rate']);
            $data['media_type'] = 'tv';

            // Initialize Cloudinary
            $cloudinary = new Cloudinary();
            $uploadApi = $uploadApi ?? $cloudinary->uploadApi();

            // Handle TV logo upload
            if ($request->hasFile('tv_logo')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('tv_logo')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/tv/logo',
                        'transformation' => [
                            'width' => 800,
                            'height' => 600,
                            'crop' => 'limit',
                        ],
                    ]
                );

                $data['tv_logo_url'] = $uploadResult['secure_url'] ?? null;
                $data['tv_logo_public_id'] = $uploadResult['public_id'] ?? null;
            }

            // Handle advert rate file upload
            if ($request->hasFile('tv_advert_rate')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('tv_advert_rate')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/tv/advert_rates',
                        'resource_type' => 'raw',
                    ]
                );

                $data['tv_advert_rate_url'] = $uploadResult['secure_url'] ?? null;
                $data['tv_advert_rate_public_id'] = $uploadResult['public_id'] ?? null;
            }

            $details = MediaOrganization::updateOrCreate(
                ['user_id' => Auth::id()],
                $data
            );

            Log::info('TV details updated', ['user_id' => Auth::id()]);

            return response()->json([
                'success' => true,
                'message' => 'TV details saved successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in updatetvDetails: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'exception' => $e
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving TV details.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function updateradioDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'radio_type' => 'required|string|max:255',
                'radio_name' => 'required|string|max:255',
                'radio_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'radio_frequency' => 'required|string|max:255',
                'radio_station_location' => 'required|string|max:255',
                'radio_content_focus' => 'required|array',
                'radio_content_focus.*' => 'string',
                'radio_target_audience' => 'required|string|max:255',
                'radio_advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:5120',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed in updateradioDetails', [
                    'errors' => $validator->errors(),
                    'user_id' => Auth::id()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except(['radio_logo', 'radio_advert_rate', 'radio_content_focus']);
            $data['media_type'] = 'radio';
            $data['radio_content_focus'] = json_encode($request->radio_content_focus);

            // Initialize Cloudinary
            $cloudinary = new Cloudinary();
            $uploadApi = $uploadApi ?? $cloudinary->uploadApi();

            // Handle radio logo upload
            if ($request->hasFile('radio_logo')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('radio_logo')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/radio/logo',
                        'transformation' => [
                            'width' => 800,
                            'height' => 600,
                            'crop' => 'limit',
                        ],
                    ]
                );

                $data['radio_logo_url'] = $uploadResult['secure_url'] ?? null;
                $data['radio_logo_public_id'] = $uploadResult['public_id'] ?? null;
            }

            // Handle advert rate file upload
            if ($request->hasFile('radio_advert_rate')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('radio_advert_rate')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/radio/advert_rates',
                        'resource_type' => 'raw',
                    ]
                );

                $data['radio_advert_rate_url'] = $uploadResult['secure_url'] ?? null;
                $data['radio_advert_rate_public_id'] = $uploadResult['public_id'] ?? null;
            }

            $details = MediaOrganization::updateOrCreate(
                ['user_id' => Auth::id()],
                $data
            );

            Log::info('Radio details updated', ['user_id' => Auth::id()]);

            return response()->json([
                'success' => true,
                'message' => 'Radio details saved successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in updateradioDetails: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'exception' => $e
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving radio details.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function updateInternetDetails(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'internet_type' => 'required|string|max:255',
                'internet_name' => 'required|string|max:255',
                'internet_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'internet_channel_location' => 'required|string|max:255',
                'internet_content_focus' => 'required|string|max:255',
                'internet_target_audience' => 'required|string|max:255',
                'internet_advert_rate' => 'nullable|file|mimes:pdf,docx,txt|max:5120',
            ]);

            if ($validator->fails()) {
                Log::error('Validation failed in updateInternetDetails', [
                    'errors' => $validator->errors(),
                    'user_id' => Auth::id()
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except(['internet_logo', 'internet_advert_rate']);
            $data['media_type'] = 'internet';

            // Initialize Cloudinary
            $cloudinary = new Cloudinary();
            $uploadApi = $uploadApi ?? $cloudinary->uploadApi();

            // Handle internet logo upload
            if ($request->hasFile('internet_logo')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('internet_logo')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/internet/logo',
                        'transformation' => [
                            'width' => 800,
                            'height' => 600,
                            'crop' => 'limit',
                        ],
                    ]
                );

                $data['internet_logo_url'] = $uploadResult['secure_url'] ?? null;
                $data['internet_logo_public_id'] = $uploadResult['public_id'] ?? null;
            }

            // Handle advert rate file upload
            if ($request->hasFile('internet_advert_rate')) {
                $uploadResult = $uploadApi->upload(
                    $request->file('internet_advert_rate')->getRealPath(),
                    [
                        'folder' => 'mediadeal/media_org/internet/advert_rates',
                        'resource_type' => 'raw',
                    ]
                );

                $data['internet_advert_rate_url'] = $uploadResult['secure_url'] ?? null;
                $data['internet_advert_rate_public_id'] = $uploadResult['public_id'] ?? null;
            }

            $details = MediaOrganization::updateOrCreate(
                ['user_id' => Auth::id()],
                $data
            );

            Log::info('Internet details updated', ['user_id' => Auth::id()]);

            return response()->json([
                'success' => true,
                'message' => 'Internet details saved successfully.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in updateInternetDetails: ' . $e->getMessage(), [
                'user_id' => Auth::id(),
                'exception' => $e
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving internet details.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
