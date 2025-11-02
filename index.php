<?php
session_start();
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tareeq Al Rahma | Charity & Relief</title>
  <meta name="description" content="Tareeq Al Rahma — charity and relief organization. Donate, volunteer, and see our impact.">
  
  <!-- Bootstrap 5 -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Favicons (replace with your own) -->
  <link rel="icon" href="/favicon.ico">
  <link href="assets/css/index.css" rel="stylesheet">
</head>
<body>
<?php if (!empty($_SESSION['user_id'])) { ?>
    <div style="position:fixed; top:10px; right:10px; background:#0a7d67; color:white; padding:6px 12px; border-radius:6px; font-size:14px;">
        loggedin
    </div>
<?php } ?>
  <?php include 'assets/layout/header.php'; ?>
  <!-- Hero -->
  <header id="home" class="hero">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" style="max-height: 600px; overflow: hidden;">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <img src="images/ww.jpg" class="d-block w-100" alt="Volunteers helping community" loading="eager">
          <div class="slide-cover"></div>
          <div class="container position-absolute top-50 start-50 translate-middle glass-card">
            <div class="p-4 p-lg-5 rounded cta col-12 col-lg-8  position-center">
              <h1 class="display-5 fw-bold google-font-400">ساهم بكسوة يتيم"</h1>
              <p class="lead mb-4  google-font-400"> "وَيَسْأَلُونَكَ عَنِ الْيَتَامَى قُلْ إِصْلَاحٌ لَهُمْ خَيْرٌ"</p>
              <div class="d-flex gap-2 flex-wrap">
                <a href="#donate" class="btn btn-lg btn-donate"><i class="bi bi-heart me-1"></i> تبرع الان</a>
                <a href="#about" class="btn btn-lg btn-donate-outline"><i class="bi bi-check-circle me-1"></i> الحالات المفتوحة</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
          <img src="images/Un2titled-2.jpg" class="d-block w-100" alt="Volunteers helping community" loading="eager">
          <div class="slide-cover"></div>
          <div class="container position-absolute top-50 start-50 translate-middle glass-card text-center"> 
                       <div class="p-4 p-lg-5 rounded cta col-12 col-lg-8">
              <h2 class="display-6 fw-bold google-font-400">ساهم في علاج مريض</h2>
              <p class="mb-4">وَمَنْ أَحْيَاهَا فَكَأَنَّمَا أَحْيَا النَّاسَ جَمِيعًا</p>
              <a href="#programs" class="btn btn-brand btn-donate-outline"> <i class="bi bi-briefcase me-1"></i> جميع الحالات</a>
            </div>
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
          <img src="images/h1-parallax-1.jpg" class="d-block w-100" alt="Volunteers helping community" loading="eager">
          <div class="slide-cover"></div>
          <div class="container position-absolute top-50 start-50 translate-middle glass-card text-center"> 
                       <div class="p-4 p-lg-5 rounded cta col-12 col-lg-8">
              <h2 class="display-6 fw-bold google-font-400" style="color: orange">شارك الان</h2>
              <p class="mb-4">حتى أقل تبرع يمكن ان يساعد في تغيير حياة انسان</p>
              <a href="#programs" class="btn btn-brand btn-donate-outline"><i class="bi bi-box-seam me-1"></i> صناديق التبرعات</a>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>

  <!-- Quick Donate -->
  <section id="donate" class="py-5 bg-white">
    <div class="container">
      <div class="row g-4 align-items-center">

        <div class="col-lg-6">
          <form class="card p-3 p-lg-4 shadow-soft t-r" onsubmit="event.preventDefault(); alert('Demo: integrate your payment gateway here.');">
            <div class="d-flex flex-wrap gap-2 mb-3" aria-label="Quick amounts">
              <button type="button" class="btn btn-outline-brand amount" data-value="25">$25</button>
              <button type="button" class="btn btn-outline-brand amount" data-value="50">$50</button>
              <button type="button" class="btn btn-outline-brand amount" data-value="100">$100</button>
              <button type="button" class="btn btn-outline-brand amount" data-value="250">$250</button>
              <button type="button" class="btn btn-outline-brand amount" data-value="500">$500</button>
            </div>
            <div class="row g-3">
              
              <div class="col-6 t-r">
                <label class="form-label " for="donationProgram">دعم برنامج:</label>
                <select id="donationProgram" class="form-select">
                  <option>صناديق التبرعات</option>
                  <option>الحالات الانسانية</option>
                  <option>السلال الغذائية</option>
                </select>
              </div>
              <div class="col-6 t-r">
                <label class="form-label" for="donationAmount">المبلغ (بالدولار الامريكي): </label>
                <input type="number" min="1" step="1" class="form-control" id="donationAmount" placeholder="50" required>
              </div>
              <div class="col-12 d-grid d-sm-flex gap-2">
                <button class="btn btn-brand btn-donation" type="submit"><i class="bi bi-credit-card-2-front me-1" style="vertical-align: middle;"></i> الدفع</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6 google-font-400" style="text-align: right;">
          <h2 class="section-title mb-3">ارسل تبرعاتك</h2>
          <p class="section-sub" style="font-size: 1.5rem; font-weight: 200;">اختر مبلغ او اختر مبلغ اخر, تبرعاتك تغيير حياة المحتاجين</p>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row align-items-center g-4">

        <div class="col-lg-6 reveal t-r" style="direction: rtl;">
          <h2 class="section-title">من نحن</h2>
          <p class="section-sub">منظمة انسانية أسست لجمع التبرعات المالية والعينية من اهل الخير والعطاء لتقديمها للمحتاجين والفقراء.</p>
          <ul class="list-unstyled lead" style="margin-right: -45px !important">
            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> 100% transparency with regular reports</li>
            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Donor‑first approach and secure payments</li>
            <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Programs audited for measurable impact</li>
          </ul>
          <a href="#contact" class="btn btn-outline-brand">Contact Us</a>
        </div>
        <div class="col-lg-6 reveal">
          <img class="rounded-4 w-100 shadow-soft" src="images/377146945_1391297991450706_5201615505180377720_n-1536x1152-1.webp" alt="Volunteers packing aid" loading="lazy">
        </div>
          </div>
    </div>
  </section>

  <!-- Programs -->
  <section id="programs" class="py-5 bg-white">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title">Our Programs</h2>
        <p class="section-sub">From emergency relief to long‑term development.</p>
      </div>
      <div class="row g-4">
        <!-- Program card template repeated -->
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1519681393781-135d8bd2d7c1?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Food Aid" loading="lazy">
            <div class="card-body">
              <span class="badge text-bg-success mb-2">Active</span>
              <h5 class="card-title">Food Aid</h5>
              <p class="card-text">Monthly food baskets and hot‑meal kitchens for families in need.</p>
              <div class="progress mb-2" role="progressbar" aria-label="Funding progress" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-success" style="width:68%"></div>
              </div>
              <small class="text-muted">68% funded</small>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#donate" class="btn btn-brand flex-fill">Donate</a>
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1530026405186-ed1f139313f8?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Orphan Care" loading="lazy">
            <div class="card-body">
              <span class="badge text-bg-primary mb-2">Sponsored</span>
              <h5 class="card-title">Orphan Care</h5>
              <p class="card-text">Comprehensive support for orphans: health, school, and mentorship.</p>
              <div class="progress mb-2" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width:45%"></div>
              </div>
              <small class="text-muted">45% funded</small>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#donate" class="btn btn-brand flex-fill">Donate</a>
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1527613426441-4da17471b66d?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Medical Relief" loading="lazy">
            <div class="card-body">
              <span class="badge text-bg-danger mb-2">Urgent</span>
              <h5 class="card-title">Medical Relief</h5>
              <p class="card-text">Mobile clinics, surgeries, and essential medicines in crisis zones.</p>
              <div class="progress mb-2" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar bg-danger" style="width:82%"></div>
              </div>
              <small class="text-muted">82% funded</small>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#donate" class="btn btn-brand flex-fill">Donate</a>
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Water Wells" loading="lazy">
            <div class="card-body">
              <span class="badge text-bg-info mb-2">New</span>
              <h5 class="card-title">Clean Water Wells</h5>
              <p class="card-text">Solar wells and filtration units for villages without safe water.</p>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#donate" class="btn btn-brand flex-fill">Donate</a>
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1519457431-44ccd32e9e9e?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Education" loading="lazy">
            <div class="card-body">
              <h5 class="card-title">Education</h5>
              <p class="card-text">Scholarships, teacher training, and STEM kits for young minds.</p>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#donate" class="btn btn-brand flex-fill">Donate</a>
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1520975867597-0af37a22e31b?q=80&w=1200&auto=format&fit=crop" class="card-img-top" alt="Shelter" loading="lazy">
            <div class="card-body">
              <h5 class="card-title">Shelter & Winter Aid</h5>
              <p class="card-text">Tents, heaters, and warm kits for harsh seasons.</p>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#donate" class="btn btn-brand flex-fill">Donate</a>
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Impact -->
  <section id="impact" class="impact py-5">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="section-title">Your Impact</h2>
        <p class="section-sub">Every number is a human story.</p>
      </div>
      <div class="row g-4 text-center">
        <div class="col-6 col-lg-3 reveal">
          <div class="card p-4 h-100">
            <div class="stat" data-count="25000">0</div>
            <div class="text-muted">Meals served</div>
          </div>
        </div>
        <div class="col-6 col-lg-3 reveal">
          <div class="card p-4 h-100">
            <div class="stat" data-count="1800">0</div>
            <div class="text-muted">Families supported</div>
          </div>
        </div>
        <div class="col-6 col-lg-3 reveal">
          <div class="card p-4 h-100">
            <div class="stat" data-count="120">0</div>
            <div class="text-muted">Wells completed</div>
          </div>
        </div>
        <div class="col-6 col-lg-3 reveal">
          <div class="card p-4 h-100">
            <div class="stat" data-count="75">0</div>
            <div class="text-muted">Active volunteers</div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="#reports" class="link-underline">Read our transparency reports</a>
      </div>
    </div>
  </section>

  <!-- Events -->
  <section id="events" class="py-5 bg-white">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-3">
        <div>
          <h2 class="section-title mb-0">Upcoming & Recent</h2>
          <p class="section-sub">Join or review our latest community actions.</p>
        </div>
        <a href="#" class="btn btn-outline-brand">View all</a>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="text-uppercase text-muted">Nov 15</h6>
              <h5 class="card-title">Winter Kits Drive</h5>
              <p class="card-text">Packing blankets, heaters, and warm clothing for families.</p>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
              <a href="#contact" class="btn btn-brand flex-fill">Volunteer</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="text-uppercase text-muted">Dec 02</h6>
              <h5 class="card-title">Health Camp</h5>
              <p class="card-text">Free checkups and medicines with partner clinics.</p>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#" class="btn btn-outline-brand flex-fill">Details</a>
              <a href="#contact" class="btn btn-brand flex-fill">Volunteer</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 reveal">
          <div class="card h-100">
            <div class="card-body">
              <h6 class="text-uppercase text-muted">Oct 10</h6>
              <h5 class="card-title">Back‑to‑School Kits</h5>
              <p class="card-text">5,000 backpacks delivered with supplies and smiles.</p>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex gap-2">
              <a href="#" class="btn btn-outline-brand flex-fill">Photos</a>
              <a href="#" class="btn btn-brand flex-fill">Report</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section id="testimonials" class="py-5">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="section-title">What People Say</h2>
        <p class="section-sub">Donors and families share their experiences.</p>
      </div>
      <div id="testi" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="card mx-auto" style="max-width:800px">
              <div class="card-body p-4 p-lg-5">
                <p class="lead mb-1">“Transparent, kind, and fast to act. I trust my donation is used well.”</p>
                <div class="text-muted">— Donor from Virginia</div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card mx-auto" style="max-width:800px">
              <div class="card-body p-4 p-lg-5">
                <p class="lead mb-1">“The food basket arrived when we needed it most. Thank you.”</p>
                <div class="text-muted">— Mother of 3</div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="card mx-auto" style="max-width:800px">
              <div class="card-body p-4 p-lg-5">
                <p class="lead mb-1">“The team helped us build a well that changed our village.”</p>
                <div class="text-muted">— Community leader</div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testi" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testi" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </section>

  <!-- Partners -->
  <section id="partners" class="py-5 bg-white">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="section-title">Partners</h2>
        <p class="section-sub">We work with trusted organizations worldwide.</p>
      </div>
      <div class="d-flex flex-wrap justify-content-center gap-4 partners">
        <img src="https://dummyimage.com/160x44/cccccc/000.png&text=Partner+1" alt="Partner 1" loading="lazy">
        <img src="https://dummyimage.com/160x44/cccccc/000.png&text=Partner+2" alt="Partner 2" loading="lazy">
        <img src="https://dummyimage.com/160x44/cccccc/000.png&text=Partner+3" alt="Partner 3" loading="lazy">
        <img src="https://dummyimage.com/160x44/cccccc/000.png&text=Partner+4" alt="Partner 4" loading="lazy">
      </div>
    </div>
  </section>

  <!-- Newsletter & Contact -->
  <section id="contact" class="py-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <h2 class="section-title">Stay in the loop</h2>
          <p class="section-sub">Get impact updates and urgent appeals.</p>
          <form class="card p-3 p-lg-4 shadow-soft" onsubmit="event.preventDefault(); alert('Demo: connect to your email service.');">
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Your name" required>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
              </div>
              <div class="col-12">
                <label class="form-label" for="message">Message</label>
                <textarea class="form-control" id="message" rows="4" placeholder="How can we help?"></textarea>
              </div>
              <div class="col-12 d-grid d-sm-flex gap-2">
                <button class="btn btn-brand" type="submit">Send</button>
                <a class="btn btn-outline-brand" href="mailto:info@tareeq-alrahma.org"><i class="bi bi-envelope me-1"></i> Email Us</a>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="card p-3 p-lg-4 h-100 shadow-soft">
            <h5 class="mb-3">Visit</h5>
            <p class="mb-1">123 Hope Street, Springfield, VA</p>
            <p class="text-muted">Mon to Fri, 10am to 6pm</p>
            <hr>
            <h5 class="mb-3">Follow</h5>
            <div class="d-flex gap-3 fs-4">
              <a class="link-dark" href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
              <a class="link-dark" href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
              <a class="link-dark" href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
              <a class="link-dark" href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
            </div>
            <hr>
            <h5 class="mb-3">Map</h5>
            <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
              <!-- Replace src with your Google Maps embed link -->
              <iframe src="https://maps.google.com/maps?q=Springfield%20VA&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'assets/layout/footer.php'; ?>
  <!-- jQuery & Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/index.js"></script>
  <script src="assets/js/be.js"></script>
</body>
</html>
