{{-- Above-the-fold enquiry form. Posts to the site's existing footer.save endpoint
     (name, email, phone, message) so no new backend is involved. --}}
<section class="seo-form-band">
    <div class="seo-form-card">
        <div class="seo-form-head">
            <h2>{{ $formTitle ?? 'Get a Free Quote' }}</h2>
            <p>{{ $formSub ?? 'Tell us where you are going and when. We will come back with a tailored price.' }}</p>
        </div>

        <form id="seo_enquiry_form" method="POST" action="{{ route('footer.save') }}">
            @csrf
            <input type="hidden" name="source_page" value="{{ $page->url_path }}">

            <div class="seo-grid">
                <div class="seo-field">
                    <label for="seo_name">Name</label>
                    <input type="text" name="name" id="seo_name" autocomplete="name" placeholder="Your name">
                </div>
                <div class="seo-field">
                    <label for="seo_phone">Phone</label>
                    <input type="tel" name="phone" id="seo_phone" autocomplete="tel" placeholder="Best number to reach you">
                </div>
                <div class="seo-field">
                    <label for="seo_email">Email</label>
                    <input type="email" name="email" id="seo_email" autocomplete="email" placeholder="you@example.com">
                </div>
                <div class="seo-field">
                    <label for="seo_message">Journey details</label>
                    <input type="text" name="message" id="seo_message"
                           placeholder="{{ $formPlaceholder ?? 'Date, pick-up point and vehicle' }}">
                </div>
            </div>

            <div class="seo-actions">
                <button type="submit" class="seo-btn seo-btn-primary">Get My Quote</button>
                <p class="seo-form-call">Prefer to talk? Call <a href="tel:08081680808">0808 168 0808</a></p>
            </div>
        </form>
    </div>
</section>
