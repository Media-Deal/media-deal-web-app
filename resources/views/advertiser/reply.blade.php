@include('advertiser.header')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('advertiser.messages.index') }}">Messages</a></li>
                                <li class="breadcrumb-item active">Reply</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Reply to Message</h4>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Message Details -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Message Details</h4>

                            <p><strong>From:</strong> {{ $message->sender_name }}</p>
                            <p><strong>Message:</strong> {{ $message->message }}</p>
                            <p><strong>Received At:</strong> {{ $message->created_at->format('d M Y, h:i A') }}</p>

                            <form action="{{ route('advertiser.messages.reply', $message->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="reply" class="form-label">Your Reply</label>
                                    <textarea name="reply" id="reply" rows="5" class="form-control"
                                        placeholder="Type your reply here">{{ old('reply', $message->reply) }}</textarea>
                                    @error('reply')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Send Reply</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('advertiser.footer')