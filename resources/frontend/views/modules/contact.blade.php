@php
    $contact = \App\Models\Contact::find($module->module_id);
@endphp
@if($contact)
    <div class="container">
        <section class="mt-10 pt-2 mb-10 pb-8">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <figure>
                        <img src="{{ $contact->image }}" width="600" height="557"
                             alt="{{ $contact->image_alt }}" />
                    </figure>
                </div>
                <div class="col-md-6 pl-md-4 mt-8 mt-md-0">
                    <h2 class="title mb-1">{{ $contact->title }}</h2>
                    <p class="mb-6">{{ $contact->subtitle }}</p>
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" id="comment-name" name="comment-name"
                                       placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <input type="email" id="comment-email" name="comment-email"
                                       placeholder="Your Email" required>
                            </div>
                            <div class="col-12 mb-4">
                                <input type="text" id="comment-subject" name="comment-subject"
                                       placeholder="Your Subject" required>
                            </div>
                            <div class="col-12 mb-4">
                                            <textarea id="comment-message" placeholder="Your Message"
                                                      required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
        <section class="mt-10 pt-8">
            <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-sm-2 cols-1 mb-10"
                 data-owl-options="{
                                'nav': false,
                                'dots': false,
                                'loop': false,
                                'margin': 20,
                                'autoplay': true,
                                'responsive': {
                                    '0': {
                                        'items': 1,
                                        'autoplay': true
                                    },
                                    '576': {
                                        'items': 2
                                    },
                                    '768': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4,
                                        'autoplay': false
                                    }
                                }
                            }">
                <div class="icon-box text-center">
                                <span class="icon-box-icon mb-4">
                                    <i class="p-icon-map"></i>
                                </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Morada</h4>
                        <p class="text-dim">{!! $contact->address !!}</p>
                    </div>
                </div>
                <div class="icon-box text-center">
                                <span class="icon-box-icon mb-4">
                                    <i class="p-icon-phone-solid"></i>
                                </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Telefone</h4>
                        <p class="text-dim">{{ $contact->phone }}</p>
                    </div>
                </div>
                <div class="icon-box text-center">
                                <span class="icon-box-icon mb-4">
                                    <i class="p-icon-message"></i>
                                </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Email</h4>
                        <p class="text-dim">{{ $contact->email }}</p>
                    </div>
                </div>
                <div class="icon-box text-center">
                                <span class="icon-box-icon mb-4">
                                    <i class="p-icon-clock"></i>
                                </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">Horário</h4>
                        <p class="text-dim">{!! $contact->timetable !!}</p>
                    </div>
                </div>
            </div>
            <hr>
        </section>
    </div>
    <div class="map">
        {!! $contact->map !!}
    </div>


    @section('scripts')
        <script>
            $('.page-content').addClass('contact-page');
        </script>
    @endsection
@endif
