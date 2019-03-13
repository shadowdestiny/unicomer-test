@if (count($errors) > 0)

    <div data-notify="container" class="col-11 col-md-4 alert alert-danger alert-with-icon" role="alert" data-notify-position="bottom-left" style="display: inline-block; margin: 15px auto; position: fixed;z-index: 1031; top: 0px; right: 20px;">
        <span data-notify="title"></span> 
        <span data-notify="message">
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </span>
        <a href="#" target="_blank" data-notify="url"></a>
    </div>

@endif