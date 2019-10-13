@extends('layouts.app')

@section('content')
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
                                        class="custom-file-input @error('bunq-file') is-invalid @enderror"
                                        name="bunq-file"
                                        id="bunq-file"
                                        aria-describedby="bunq-file"
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"
                                />
                                <label id="bunq-file-label" class="custom-file-label" for="bunq-file">{{ __('Choose file') }}</label>
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
@endsection

@push('scripts')
    <script type="text/javascript">
      $('#bunq-file').on('change', function() {
        let fileName = $(this).val()
        console.log(fileName)
        $('#bunq-file-label').text(fileName)
      })
    </script>
@endpush
