@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>{{ __('Please fix the following errors:') }}</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('process') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">

                                <div class="input-group">
                                    <input
                                            type="file"
                                            class="custom-file-input"
                                            name="ing-file"
                                            id="ing-file"
                                            aria-describedby="ing-file"
                                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"
                                    />
                                    <label id="ing-file-label" class="custom-file-label" for="ing-file">{{ __('Choose file') }}</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Process') }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
      $('#ing-file').on('change', function() {
        let fileName = $(this).val()
        console.log(fileName)
        $('#ing-file-label').text(fileName)
      })
    </script>
@endpush
