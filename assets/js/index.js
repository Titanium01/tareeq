
    // Year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Quick amounts
    $('.amount').on('click', function(){
      $('.amount').removeClass('active');
      $(this).addClass('active');
      $('#donationAmount').val($(this).data('value'));
    });

    // Reveal on scroll
    const observer = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('visible'); } });
    },{threshold:.12});
    document.querySelectorAll('.reveal').forEach(el=>observer.observe(el));

    // Counters
    function animateCounter(el){
      const end = parseInt(el.getAttribute('data-count'),10);
      const inc = Math.max(1, Math.floor(end/120));
      let val = 0;
      const t = setInterval(()=>{
        val += inc;
        if(val >= end){ val = end; clearInterval(t); }
        el.textContent = val.toLocaleString();
      }, 16);
    }
    const statObs = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting){ animateCounter(e.target); statObs.unobserve(e.target); }
      });
    },{threshold:.6});
    document.querySelectorAll('.stat').forEach(el=>statObs.observe(el));

    // Back to top
    const back = document.getElementById('backToTop');
    window.addEventListener('scroll', ()=>{
      if(window.scrollY > 400){ back.style.display='block'; } else { back.style.display='none'; }
    });
    back.addEventListener('click', ()=> window.scrollTo({top:0, behavior:'smooth'}));

    // RTL toggle
    document.getElementById('toggle-rtl').addEventListener('click', function(){
      const html = document.documentElement;
      const isRtl = html.getAttribute('dir') === 'rtl';
      html.setAttribute('dir', isRtl ? 'ltr' : 'rtl');
      document.body.classList.toggle('rtl', !isRtl);
      this.textContent = isRtl ? 'عربي' : 'English';
    });