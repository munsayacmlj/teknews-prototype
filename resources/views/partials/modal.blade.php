<div class="modal fade stick-up" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding: 0;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header mt-2" style="border-bottom: none;">
        <h5 class="modal-title" id="exampleModalLabel"><span class="text-muted h3">New</span> <span class="h3">Post</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- if user has logged in --}}
        @auth
        <form id="modalForm" action="/posts" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          <input type="hidden" value="{{ Auth::user()->getSnakeCaseName() }}" id="authUserName">

          <div class="topic form-group w-75">
            <label>Topic</label>
            <select class="form-control" name="topic_id">
              @foreach ($topics as $topic)
              <option value="{{ $topic->id }}">{{ $topic->topic }}</option>
              @endforeach
            </select>
          </div>

          <div class="title form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control new-post-title" placeholder="Title..." required>
          </div>

          <div class="text form-group">
            <label>Text</label>
            <textarea rows="7" class="form-control" placeholder="Say Something..." name="content" maxlength="500"></textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
            <label>Photo</label>
            <div class="input-group">
              <input type="text" id="filename" class="form-control" placeholder="No file selected" readonly>
              <span class="input-group-btn">
                <div class="btn btn-default custom-file-uploader">
                  <input type="file" name="image" id="image">
                  <i class="fas fa-folder-open fa-2x"></i>                    
                </div>
              </span>
            </div>
          </div>

          <div class="col-md-6">

          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary float-right">Post</button>
        </div>
      </form>
      @else
        <div class="mt-5">
          <a href="{{ route('login') }}" class="btn btn-primary btn-rounded btn-lg mb-3">Please Sign in</a>
        </div>
      @endauth
    </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
      </div> 
    </div>
  </div> 
</div> <!-- /.modal -->