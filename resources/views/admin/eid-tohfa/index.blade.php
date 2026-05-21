@extends('admin.layout')

@section('content')
<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <span class="text-muted">Eid Tohfa Management</span>
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
                <div class="card-body p-lg-4">
                    
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs mb-4" id="eidTohfaTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('active_tab') ? '' : 'active' }}" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab">
                                <i class="bi bi-gear me-1"></i> Settings
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('active_tab') == 'comments' ? 'active' : '' }}" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab">
                                <i class="bi bi-chat-dots me-1"></i> Comments ({{ $comments->count() }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('active_tab') == 'leads' ? 'active' : '' }}" id="leads-tab" data-bs-toggle="tab" data-bs-target="#leads" type="button" role="tab">
                                <i class="bi bi-geo-alt me-1"></i> Leads ({{ $leads->count() }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('active_tab') == 'notifications' ? 'active' : '' }}" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                                <i class="bi bi-bell me-1"></i> Notifications ({{ $notifications->count() }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('active_tab') == 'images' ? 'active' : '' }}" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab">
                                <i class="bi bi-image me-1"></i> Images ({{ $images->count() }})
                            </button>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content" id="eidTohfaTabsContent">
                        
                        <!-- SETTINGS TAB -->
                        <div class="tab-pane fade {{ session('active_tab') ? '' : 'show active' }}" id="settings" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Page Settings</h5>
                                <div>
                                    <a href="{{ route('eid-tohfa.edit') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil"></i> Edit All
                                    </a>
                                    <a href="{{ route('eid-tohfa.initialize') }}" class="btn btn-success btn-sm" onclick="return confirm('Reset to defaults?')">
                                        <i class="bi bi-arrow-clockwise"></i> Initialize
                                    </a>
                                </div>
                            </div>
                            
                            @if($eidSettings->isEmpty())
                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle me-2"></i>
                                    No settings found. Click "Initialize" to create defaults.
                                </div>
                            @else
                                @foreach($eidSettings as $group => $groupSettings)
                                <div class="mb-4">
                                    <h6 class="text-uppercase text-muted mb-3">
                                        <i class="bi bi-folder2-open me-2"></i>{{ ucfirst($group) }}
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="25%">Key</th>
                                                    <th width="45%">Value</th>
                                                    <th width="20%">Description</th>
                                                    <th width="10%">Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($groupSettings as $setting)
                                                <tr>
                                                    <td><code class="small">{{ $setting->key }}</code></td>
                                                    <td><small>{{ \Str::limit($setting->value, 60) }}</small></td>
                                                    <td><small class="text-muted">{{ $setting->description }}</small></td>
                                                    <td><span class="badge bg-secondary">{{ $setting->type }}</span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- COMMENTS TAB -->
                        <div class="tab-pane fade {{ session('active_tab') == 'comments' ? 'show active' : '' }}" id="comments" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Manage Comments</h5>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCommentModal">
                                    <i class="bi bi-plus-circle"></i> Add Comment
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th width="15%">User Name</th>
                                            <th width="40%">Comment</th>
                                            <th width="10%">Time</th>
                                            <th width="10%">Type</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->order }}</td>
                                            <td>{{ $comment->user_name }}</td>
                                            <td><small>{{ \Str::limit($comment->comment_text, 50) }}</small></td>
                                            <td>{{ $comment->time_ago }}</td>
                                            <td>
                                                @if($comment->is_reply)
                                                    <span class="badge bg-info">Reply</span>
                                                @else
                                                    <span class="badge bg-primary">Comment</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($comment->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="editComment({{ $comment->id }}, '{{ $comment->user_name }}', '{{ addslashes($comment->comment_text) }}', '{{ $comment->time_ago }}', {{ $comment->is_liked ? 'true' : 'false' }}, {{ $comment->is_reply ? 'true' : 'false' }}, {{ $comment->order }}, {{ $comment->status ? 'true' : 'false' }}, '{{ $comment->avatar_url }}')">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ route('eid-tohfa.comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this comment?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No comments found. Add your first comment!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- LEADS TAB -->
                        <div class="tab-pane fade {{ session('active_tab') == 'leads' ? 'show active' : '' }}" id="leads" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">User Submissions ({{ $leads->count() }})</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-sm">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="4%">#</th>
                                            <th width="10%">First Visit</th>
                                            <th width="10%">CNIC</th>
                                            <th width="9%">Status</th>
                                            <th width="14%">Location</th>
                                            <th width="7%">Accuracy</th>
                                            <th width="11%">Bank</th>
                                            <th width="11%">Account</th>
                                            <th width="10%">First IP</th>
                                            <th width="10%">Current IP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($leads as $lead)
                                        <tr>
                                            <td>{{ $lead->id }}</td>
                                            <td><small>{{ optional($lead->first_visit_at)->format('d M H:i') ?: $lead->created_at->format('d M H:i') }}</small></td>
                                            <td>{{ $lead->cnic ? $lead->cnic : '-' }}</td>
                                            <td>
                                                @if($lead->status === 'completed')
                                                    <span class="badge bg-success">Done</span>
                                                @elseif($lead->status === 'location_captured')
                                                    <span class="badge bg-info">Location</span>
                                                @elseif($lead->status === 'cnic_submitted')
                                                    <span class="badge bg-warning text-dark">CNIC</span>
                                                @elseif($lead->status === 'visited')
                                                    <span class="badge bg-secondary">Visited</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ $lead->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($lead->latitude)
                                                    <small>{{ number_format($lead->latitude, 6) }}, {{ number_format($lead->longitude, 6) }}</small>
                                                    <br>
                                                    <a href="https://www.google.com/maps?q={{ $lead->latitude }},{{ $lead->longitude }}" target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                                        <i class="bi bi-geo-alt-fill"></i> Map
                                                    </a>
                                                    @php
                                                        $history = $lead->location_history ? json_decode($lead->location_history, true) : [];
                                                    @endphp
                                                    @if(!empty($history))
                                                        <div class="mt-2">
                                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="bi bi-clock-history"></i> History ({{ count($history) }})
                                                            </button>
                                                            <ul class="dropdown-menu shadow">
                                                                <li><h6 class="dropdown-header">Previous Locations</h6></li>
                                                                @foreach(array_reverse($history) as $loc)
                                                                    <li>
                                                                        <a class="dropdown-item" href="https://www.google.com/maps?q={{ $loc['latitude'] }},{{ $loc['longitude'] }}" target="_blank">
                                                                            <small>
                                                                                <i class="bi bi-geo-alt"></i> {{ number_format($loc['latitude'], 4) }}, {{ number_format($loc['longitude'], 4) }}
                                                                                @if(isset($loc['accuracy']))
                                                                                    <span class="text-muted ms-1">({{ round($loc['accuracy']) }}m)</span>
                                                                                @endif
                                                                            </small>
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>{{ $lead->accuracy ? round($lead->accuracy) . 'm' : '-' }}</td>
                                            <td>{{ $lead->bank_name ?: '-' }}</td>
                                            <td>{{ $lead->account_number ?: '-' }}</td>
                                            <td><small>{{ $lead->first_visit_ip ?: '-' }}</small></td>
                                            <td><small>{{ $lead->ip_address ?: '-' }}</small></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-muted">No submissions yet.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- NOTIFICATIONS TAB -->
                        <div class="tab-pane fade {{ session('active_tab') == 'notifications' ? 'show active' : '' }}" id="notifications" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Manage Toast Notifications</h5>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addNotificationModal">
                                    <i class="bi bi-plus-circle"></i> Add Notification
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="5%">Order</th>
                                            <th width="70%">Message</th>
                                            <th width="10%">Status</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->order }}</td>
                                            <td>{{ $notification->message }}</td>
                                            <td>
                                                @if($notification->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="editNotification({{ $notification->id }}, '{{ addslashes($notification->message) }}', {{ $notification->order }}, {{ $notification->status ? 'true' : 'false' }})">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ route('eid-tohfa.notifications.destroy', $notification->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this notification?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">No notifications found. Add your first notification!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- IMAGES TAB -->
                        <div class="tab-pane fade {{ session('active_tab') == 'images' ? 'show active' : '' }}" id="images" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Manage Images</h5>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addImageModal">
                                    <i class="bi bi-plus-circle"></i> Add Image
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="5%">Order</th>
                                            <th width="20%">Title</th>
                                            <th width="40%">URL</th>
                                            <th width="15%">Type</th>
                                            <th width="10%">Status</th>
                                            <th width="10%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($images as $image)
                                        <tr>
                                            <td>{{ $image->order }}</td>
                                            <td>{{ $image->title }}</td>
                                            <td><small><a href="{{ $image->image_url }}" target="_blank">{{ \Str::limit($image->image_url, 40) }}</a></small></td>
                                            <td><span class="badge bg-info">{{ $image->type }}</span></td>
                                            <td>
                                                @if($image->status)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning" onclick="editImage({{ $image->id }}, '{{ $image->title }}', '{{ $image->image_url }}', '{{ $image->type }}', {{ $image->order }}, {{ $image->status ? 'true' : 'false' }})">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <form action="{{ route('eid-tohfa.images.destroy', $image->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No images found. Add your first image!</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add Comment Modal -->
<div class="modal fade" id="addCommentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('eid-tohfa.comments.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">User Name *</label>
                        <input type="text" name="user_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Avatar URL</label>
                        <input type="url" name="avatar_url" class="form-control" placeholder="https://...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment Text *</label>
                        <textarea name="comment_text" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Time Ago</label>
                            <input type="text" name="time_ago" class="form-control" value="1m">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_liked" value="1" class="form-check-input" id="isLiked" checked>
                                <label class="form-check-label" for="isLiked">Is Liked</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_reply" value="1" class="form-check-input" id="isReply">
                                <label class="form-check-label" for="isReply">Is Reply</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="status" value="1" class="form-check-input" id="commentStatus" checked>
                                <label class="form-check-label" for="commentStatus">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Comment Modal -->
<div class="modal fade" id="editCommentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCommentForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">User Name *</label>
                        <input type="text" name="user_name" id="edit_user_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Avatar URL</label>
                        <input type="url" name="avatar_url" id="edit_avatar_url" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment Text *</label>
                        <textarea name="comment_text" id="edit_comment_text" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Time Ago</label>
                            <input type="text" name="time_ago" id="edit_time_ago" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="edit_order" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_liked" value="1" class="form-check-input" id="edit_is_liked">
                                <label class="form-check-label" for="edit_is_liked">Is Liked</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_reply" value="1" class="form-check-input" id="edit_is_reply">
                                <label class="form-check-label" for="edit_is_reply">Is Reply</label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="status" value="1" class="form-check-input" id="edit_status">
                                <label class="form-check-label" for="edit_status">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Notification Modal -->
<div class="modal fade" id="addNotificationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('eid-tohfa.notifications.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Message *</label>
                        <textarea name="message" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="status" value="1" class="form-check-input" id="notifStatus" checked>
                                <label class="form-check-label" for="notifStatus">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Notification</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Notification Modal -->
<div class="modal fade" id="editNotificationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editNotificationForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Message *</label>
                        <textarea name="message" id="edit_notif_message" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="edit_notif_order" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="status" value="1" class="form-check-input" id="edit_notif_status">
                                <label class="form-check-label" for="edit_notif_status">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Notification</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Image Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('eid-tohfa.images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image URL</label>
                        <input type="url" name="image_url" id="add_image_url" class="form-control" placeholder="https://...">
                        <small class="text-muted">Or upload image from PC below</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload Image from PC</label>
                        <input type="file" name="image_file" class="form-control" accept="image/*" id="add_image_file" onchange="previewAddImage(this)">
                        <small class="text-muted">Choose either URL or upload file</small>
                        <div class="mt-2">
                            <img id="add_image_preview" style="max-width: 200px; max-height: 200px; display: none;" class="border rounded">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type *</label>
                            <select name="type" class="form-select" required>
                                <option value="general">General</option>
                                <option value="header">Header</option>
                                <option value="reaction">Reaction Icon</option>
                                <option value="comment_avatar">Comment Avatar</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="status" value="1" class="form-check-input" id="imageStatus" checked>
                        <label class="form-check-label" for="imageStatus">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Image</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Image Modal -->
<div class="modal fade" id="editImageModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editImageForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" id="edit_img_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image URL</label>
                        <input type="url" name="image_url" id="edit_img_url" class="form-control">
                        <small class="text-muted">Or upload new image from PC below</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload New Image from PC</label>
                        <input type="file" name="image_file" class="form-control" accept="image/*" id="edit_image_file" onchange="previewEditImage(this)">
                        <small class="text-muted">Leave empty to keep current image</small>
                        <div class="mt-2">
                            <img id="edit_image_preview" style="max-width: 200px; max-height: 200px; display: none;" class="border rounded">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type *</label>
                            <select name="type" id="edit_img_type" class="form-select" required>
                                <option value="general">General</option>
                                <option value="header">Header</option>
                                <option value="reaction">Reaction Icon</option>
                                <option value="comment_avatar">Comment Avatar</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" id="edit_img_order" class="form-control">
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="status" value="1" class="form-check-input" id="edit_img_status">
                        <label class="form-check-label" for="edit_img_status">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Image</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editComment(id, userName, commentText, timeAgo, isLiked, isReply, order, status, avatarUrl) {
    document.getElementById('editCommentForm').action = "{{ url('panel/admin/eid-tohfa/comments/update') }}/" + id;
    document.getElementById('edit_user_name').value = userName;
    document.getElementById('edit_avatar_url').value = avatarUrl || '';
    document.getElementById('edit_comment_text').value = commentText;
    document.getElementById('edit_time_ago').value = timeAgo;
    document.getElementById('edit_order').value = order;
    document.getElementById('edit_is_liked').checked = isLiked;
    document.getElementById('edit_is_reply').checked = isReply;
    document.getElementById('edit_status').checked = status;
    new bootstrap.Modal(document.getElementById('editCommentModal')).show();
}

function editNotification(id, message, order, status) {
    document.getElementById('editNotificationForm').action = "{{ url('panel/admin/eid-tohfa/notifications/update') }}/" + id;
    document.getElementById('edit_notif_message').value = message;
    document.getElementById('edit_notif_order').value = order;
    document.getElementById('edit_notif_status').checked = status;
    new bootstrap.Modal(document.getElementById('editNotificationModal')).show();
}

function editImage(id, title, imageUrl, type, order, status) {
    document.getElementById('editImageForm').action = "{{ url('panel/admin/eid-tohfa/images/update') }}/" + id;
    document.getElementById('edit_img_title').value = title;
    document.getElementById('edit_img_url').value = imageUrl;
    document.getElementById('edit_img_type').value = type;
    document.getElementById('edit_img_order').value = order;
    document.getElementById('edit_img_status').checked = status;
    
    // Show current image if exists
    const preview = document.getElementById('edit_image_preview');
    if (imageUrl) {
        preview.src = imageUrl.startsWith('http') ? imageUrl : "{{ asset('') }}" + imageUrl;
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
    
    new bootstrap.Modal(document.getElementById('editImageModal')).show();
}

function previewAddImage(input) {
    const preview = document.getElementById('add_image_preview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

function previewEditImage(input) {
    const preview = document.getElementById('edit_image_preview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Store active tab on click
$('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('activeEidTohfaTab', $(e.target).attr('id'));
});

// Restore active tab on load
document.addEventListener('DOMContentLoaded', function() {
    const activeTab = localStorage.getItem('activeEidTohfaTab');
    const sessionTab = "{{ session('active_tab') }}";
    
    if (sessionTab) {
        // If session flashed a tab, prefer it and save it
        localStorage.setItem('activeEidTohfaTab', sessionTab + '-tab');
    } else if (activeTab) {
        // Otherwise use the stored tab
        const tabElement = document.getElementById(activeTab);
        if (tabElement) {
            new bootstrap.Tab(tabElement).show();
        }
    }
});
</script>
@endsection
