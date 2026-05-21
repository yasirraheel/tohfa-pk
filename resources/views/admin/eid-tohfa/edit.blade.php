@extends('admin.layout')

@section('content')
<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <a class="text-reset" href="{{ route('eid-tohfa.index') }}">Eid Tohfa Settings</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <span class="text-muted">Edit Settings</span>
</h5>

<div class="content">
    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check2 me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            @endif

            @include('errors.errors-forms')

            <div class="card shadow-custom border-0">
                <div class="card-body p-lg-5">

                    <form method="POST" action="{{ route('eid-tohfa.update') }}" enctype="multipart/form-data">
                        @csrf

                        @foreach($eidSettings as $group => $groupSettings)
                        <div class="mb-5">
                            <h5 class="text-uppercase text-primary mb-4 pb-2 border-bottom">
                                <i class="bi bi-folder2-open me-2"></i>{{ ucfirst($group) }} Settings
                            </h5>

                            @foreach($groupSettings as $setting)
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label text-lg-end">
                                    {{ $setting->description ?: $setting->key }}
                                    <br><small class="text-muted"><code>{{ $setting->key }}</code></small>
                                </label>
                                <div class="col-sm-9">
                                    @php
                                        $imageFields = ['header_image', 'favicon_url', 'og_image', 'twitter_image'];
                                        $isImageField = in_array($setting->key, $imageFields);
                                    @endphp
                                    
                                    @if($isImageField)
                                        <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="form-control" placeholder="Enter URL or upload below">
                                    @elseif($setting->type == 'textarea')
                                        <textarea name="{{ $setting->key }}" class="form-control" rows="4">{{ $setting->value }}</textarea>
                                    @elseif($setting->type == 'number')
                                        <input type="number" name="{{ $setting->key }}" value="{{ $setting->value }}" class="form-control">
                                    @elseif($setting->type == 'url')
                                        <input type="url" name="{{ $setting->key }}" value="{{ $setting->value }}" class="form-control" placeholder="https://example.com">
                                    @else
                                        <input type="text" name="{{ $setting->key }}" value="{{ $setting->value }}" class="form-control">
                                    @endif
                                    
                                    @if($isImageField)
                                        <div class="mt-3 p-3 border rounded" style="background-color: #ffffff !important; border: 2px solid #0d6efd !important; color: #000 !important;">
                                            <label class="form-label fw-bold d-block mb-2" style="color: #0d6efd !important; font-size: 16px;">📁 Or Upload Image from PC:</label>
                                            <input type="file" 
                                                name="{{ $setting->key }}_file" 
                                                accept="image/*" 
                                                id="file_{{ $setting->key }}" 
                                                onchange="previewImage(this, 'preview_{{ $setting->key }}')" 
                                                style="border: 2px solid #0d6efd !important; padding: 10px !important; cursor: pointer !important; display: block !important; width: 100% !important; height: auto !important; background-color: #ffffff !important; color: #000000 !important; opacity: 1 !important; visibility: visible !important; position: relative !important; z-index: 999 !important; font-size: 14px !important; border-radius: 5px !important;">
                                            
                                            @if($setting->value)
                                                @php
                                                    $previewUrl = \App\Models\EidTohfaSetting::imageUrl($setting->value);
                                                @endphp
                                                <div class="mt-2">
                                                    <small class="text-muted fw-bold">Current Image:</small><br>
                                                    <img src="{{ $previewUrl }}" alt="Current" id="preview_{{ $setting->key }}" style="max-width: 200px; max-height: 200px; margin-top: 5px;" class="border rounded">
                                                    <br><small><a href="{{ $previewUrl }}" target="_blank">{{ \Str::limit($setting->value, 50) }} <i class="bi bi-box-arrow-up-right"></i></a></small>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <img id="preview_{{ $setting->key }}" style="max-width: 200px; max-height: 200px; margin-top: 5px; display: none;" class="border rounded">
                                                </div>
                                            @endif
                                        </div>
                                    @elseif($setting->type == 'url' && $setting->value)
                                        <small class="text-muted">
                                            <a href="{{ $setting->value }}" target="_blank">Preview Link <i class="bi bi-box-arrow-up-right"></i></a>
                                        </small>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach

                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Save All Changes
                                </button>
                                <a href="{{ route('eid-tohfa.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle me-1"></i> Cancel
                                </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
