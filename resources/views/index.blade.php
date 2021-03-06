<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>{{ __('Muthofun - ') . config('app.name') }} </title>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/muthofun/css/style.css') }}">
    </head>
    <body>
        <div class="container contact-form">
            <div class="contact-image">
                <img src="{{ asset('vendor/muthofun/images/rocket.png') }}" alt="rocket_contact"/>
            </div>
            <form method="post">
                @csrf
                <h3>{{ __('muthofun::muthofun.drop_message') }}</h3>
                @isset($msg)
                    <div class="alert alert-{{ $status ? 'success' : 'danger'}}" role="alert">
                        {{ $msg }}
                    </div>
                @endisset
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name *" />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Your Subject *" />
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Your Mobile Number *" />
                            @error('mobile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btnMessageSubmit" value="{{ __('muthofun::muthofun.send_message') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>