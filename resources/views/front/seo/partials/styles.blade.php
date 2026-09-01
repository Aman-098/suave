{{-- SEO page styling. Scoped to .seo-* so no theme class is overridden globally.
     Palette taken from the live site: gold #BE9B5A / #C9A765, dark #222 / #141414,
     body text #9BA0A6, headings #fff, Plus Jakarta Sans. --}}
<style>
    :root{--seo-gold:#BE9B5A;--seo-gold-lt:#C9A765;--seo-ink:#9BA0A6;--seo-line:rgba(255,255,255,.10)}

    /* ---- reading column ------------------------------------------------ */
    .seo-body{padding:70px 0 120px}
    .seo-wrap{max-width:820px;margin:0 auto;padding:0 20px}
    .seo-wide{max-width:1140px;margin:0 auto;padding:0 20px}

    /* ---- typography ---------------------------------------------------- */
    .seo-body p{color:var(--seo-ink);font-size:17px;line-height:1.85;margin:0 0 22px}
    .seo-body ul{margin:0 0 22px;padding-left:22px}
    .seo-body li{color:var(--seo-ink);font-size:17px;line-height:1.8;margin-bottom:10px}
    .seo-body strong{color:#fff;font-weight:600}
    .seo-body em{color:#c9cdd2}
    .seo-body h2{color:#fff;font-size:30px;font-weight:700;line-height:1.3;margin:0 0 20px;
        text-transform:none!important;letter-spacing:-.01em}
    .seo-body h3{color:#fff;font-size:20px;font-weight:600;margin:30px 0 12px;text-transform:none!important}
    .seo-body a{color:var(--seo-gold-lt);text-decoration:none;border-bottom:1px solid rgba(201,167,101,.35)}
    .seo-body a:hover{color:#fff;border-bottom-color:#fff}

    /* ---- hero standfirst ----------------------------------------------- */
    .seo-page-standfirst{max-width:760px;margin:18px auto 0;color:#e6e8ea;font-size:17px;line-height:1.7;
        text-shadow:0 1px 12px rgba(0,0,0,.85)}

    /* ---- enquiry form -------------------------------------------------- */
    .seo-form-band{background:#141414;border-top:1px solid var(--seo-line);border-bottom:1px solid var(--seo-line);
        padding:52px 0}
    .seo-form-card{max-width:860px;margin:0 auto;padding:0 20px}
    .seo-form-head{text-align:center;margin-bottom:28px}
    .seo-form-head h2{color:#fff;font-size:28px;font-weight:700;margin:0 0 10px;text-transform:none!important}
    .seo-form-head p{color:var(--seo-ink);font-size:16px;margin:0}
    .seo-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
    .seo-field label{display:block;color:#cfd3d7;font-size:13px;font-weight:600;letter-spacing:.04em;
        text-transform:uppercase;margin-bottom:8px}
    .seo-field input{width:100%;height:52px;padding:0 16px;background:#1e1e1e;color:#fff;font-size:15px;
        border:1px solid rgba(255,255,255,.14);border-radius:6px;outline:none;transition:border-color .15s,box-shadow .15s}
    .seo-field input::placeholder{color:#6f7479}
    .seo-field input:focus{border-color:var(--seo-gold);box-shadow:0 0 0 3px rgba(190,155,90,.18)}
    .seo-actions{display:flex;align-items:center;gap:20px;flex-wrap:wrap;margin-top:24px}
    .seo-btn{display:inline-flex;align-items:center;justify-content:center;height:54px;padding:0 34px;
        border:1px solid var(--seo-gold);border-radius:6px;font-size:15px;font-weight:600;letter-spacing:.02em;
        cursor:pointer;transition:.18s;text-decoration:none;border-bottom-width:1px}
    .seo-btn-primary{background:var(--seo-gold);color:#141414}
    .seo-btn-primary:hover{background:var(--seo-gold-lt);color:#141414}
    .seo-btn-ghost{background:transparent;color:var(--seo-gold-lt)}
    .seo-btn-ghost:hover{background:rgba(190,155,90,.12);color:#fff;border-color:var(--seo-gold-lt)}
    .seo-body .seo-btn{border-bottom:1px solid var(--seo-gold)}
    .seo-form-call{color:var(--seo-ink);font-size:15px;margin:0}
    .seo-form-call a{color:var(--seo-gold-lt);font-weight:600}

    /* ---- direct answer block ------------------------------------------- */
    .seo-answer{position:relative;background:linear-gradient(180deg,rgba(190,155,90,.10),rgba(190,155,90,.03));
        border:1px solid rgba(190,155,90,.28);border-radius:10px;padding:26px 30px;margin:0 0 56px}
    .seo-answer:before{content:"In short";position:absolute;top:-11px;left:26px;background:#0d0d0d;
        color:var(--seo-gold);font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:0 10px}
    .seo-body .seo-answer p{color:#eceef0;font-size:18px;line-height:1.75;margin:0}

    /* ---- sections ------------------------------------------------------ */
    .seo-section{margin:0 0 56px}
    .seo-section>h2{padding-top:18px;border-top:2px solid rgba(190,155,90,.45);display:inline-block}

    /* ---- comparison table ---------------------------------------------- */
    .seo-table-scroll{overflow-x:auto;-webkit-overflow-scrolling:touch;border:1px solid var(--seo-line);
        border-radius:10px;background:#131313}
    .seo-table{width:100%;border-collapse:collapse;min-width:600px}
    .seo-table th,.seo-table td{padding:15px 18px;text-align:left;font-size:15px;color:var(--seo-ink);
        border-bottom:1px solid var(--seo-line);vertical-align:top;line-height:1.6}
    .seo-table thead th{color:#fff;font-weight:600;font-size:13px;letter-spacing:.06em;text-transform:uppercase;
        background:rgba(190,155,90,.14);white-space:nowrap}
    .seo-table tbody tr:last-child td{border-bottom:none}
    .seo-table tbody td:first-child{color:#fff;font-weight:600}
    .seo-table span{display:block;color:var(--seo-ink);font-weight:400;font-size:13px;margin-top:3px}

    /* ---- FAQ ----------------------------------------------------------- */
    .seo-faq-item{border:1px solid var(--seo-line);border-radius:8px;margin-bottom:12px;background:#131313;
        transition:border-color .15s}
    .seo-faq-item[open]{border-color:rgba(190,155,90,.38)}
    .seo-faq-item summary{color:#fff;font-weight:600;font-size:17px;cursor:pointer;list-style:none;
        display:flex;justify-content:space-between;align-items:center;gap:18px;padding:18px 22px}
    .seo-faq-item summary::-webkit-details-marker{display:none}
    .seo-faq-item summary:after{content:"+";color:var(--seo-gold);font-size:24px;line-height:1;flex:0 0 auto}
    .seo-faq-item[open] summary:after{content:"\2212"}
    .seo-faq-answer{padding:0 22px 6px}
    .seo-body .seo-faq-answer p{font-size:16px}

    /* ---- vehicle cards ------------------------------------------------- */
    .seo-cards{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:20px;margin:0 0 20px}
    .seo-card{display:block;background:#131313;border:1px solid var(--seo-line);border-radius:10px;
        overflow:hidden;text-decoration:none;border-bottom:1px solid var(--seo-line);transition:.18s}
    .seo-card:hover{border-color:rgba(190,155,90,.5);transform:translateY(-3px)}
    .seo-card-img{aspect-ratio:16/10;width:100%;object-fit:cover;display:block;background:#1b1b1b}
    .seo-card-name{padding:14px 16px;color:#fff;font-size:15px;font-weight:600}
    .seo-body .seo-card{border-bottom-color:var(--seo-line)}
    .seo-body .seo-card:hover .seo-card-name{color:var(--seo-gold-lt)}

    /* ---- internal link blocks ------------------------------------------ */
    .seo-links{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:28px;
        margin:56px 0;padding:34px 0;border-top:1px solid var(--seo-line);border-bottom:1px solid var(--seo-line)}
    .seo-linkblock-title{color:#fff;font-size:12px;font-weight:700;text-transform:uppercase;
        letter-spacing:.12em;margin:0 0 14px}
    .seo-linkblock-list{list-style:none;padding:0;margin:0}
    .seo-linkblock-list li{margin:0 0 10px}
    .seo-body .seo-linkblock-list a{font-size:15px;border-bottom:none}
    .seo-body .seo-linkblock-list a:hover{border-bottom:1px solid #fff}

    /* ---- byline + sources ---------------------------------------------- */
    .seo-meta{display:grid;grid-template-columns:1fr;gap:26px;margin:48px 0 0;padding:26px 0 0;
        border-top:1px solid var(--seo-line)}
    .seo-byline p{margin:0;font-size:14px;color:#7e838a}
    .seo-byline strong{color:#cfd3d7}
    .seo-sources h2{font-size:13px;letter-spacing:.12em;text-transform:uppercase;color:#7e838a;margin-bottom:12px}
    .seo-sources ol{padding-left:18px;margin:0}
    .seo-sources li{font-size:14px;margin-bottom:9px;color:#7e838a;line-height:1.6}
    .seo-body .seo-sources a{font-size:14px}

    /* ---- closing CTA ---------------------------------------------------- */
    .seo-cta{margin:56px 0 0;padding:46px 34px;border-radius:14px;text-align:center;
        background:linear-gradient(160deg,#1c1a17,#111);border:1px solid rgba(190,155,90,.3)}
    .seo-cta h2{margin-bottom:14px;border-top:none;padding-top:0}
    .seo-body .seo-cta p{max-width:620px;margin:0 auto 26px}
    .seo-cta-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap}

    /* ---- responsive ------------------------------------------------------ */
    @media (max-width:767px){
        .seo-body{padding:44px 0 90px}
        .seo-body h2{font-size:24px}
        .seo-body p,.seo-body li{font-size:16px}
        .seo-grid{grid-template-columns:1fr}
        .seo-answer{padding:22px 20px}
        .seo-body .seo-answer p{font-size:17px}
        .seo-cta{padding:34px 20px}
        .seo-btn{width:100%}
    }
</style>
