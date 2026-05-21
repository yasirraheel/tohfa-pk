@extends('admin.layout')

@section('content')
<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <a class="text-reset" href="{{ route('eid-tohfa.index') }}">Eid Tohfa Settings</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <span class="text-muted">Add New Setting</span>
</h5>

<div class="content">
    <div class="row">
        <div class="col-lg-12">

            @include('errors.errors-forms')

            <div class="card shadow-custom border-0">
                <div class="card-body p-lg-5">

                    <form method="POST" action="{{ route('eid-tohfa.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">Setting Key</label>
                            <div class="col-sm-10">
                                <input type="text" name="key" class="form-control" required placeholder="e.g., custom_text">
                                <small class="text-muted">Use lowercase with underscores (e.g., my_custom_setting)</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">Value</label>
                            <div class="col-sm-10">
                                <textarea name="value" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">Type</label>
                            <div class="col-sm-10">
                                <select name="type" class="form-select" required>
                                    <option value="text">Text</option>
                                    <option value="textarea">Textarea</option>
                                    <option value="number">Number</option>
                                    <option value="url">URL</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">Group</label>
                            <div class="col-sm-10">
                                <select name="group" class="form-select" required>
                                    <option value="general">General</option>
                                    <option value="content">Content</option>
                                    <option value="images">Images</option>
                                    <option value="links">Links</option>
                                    <option value="notifications">Notifications</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" placeholder="Brief description of this setting">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-1"></i> Create Setting
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
@endsection
