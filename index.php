<?php
// index.php – Silambarasan K | Portfolio
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="Silambarasan K – Web Developer & UI Developer. Crafting responsive, visually stunning web experiences using HTML5, CSS3, JavaScript & Bootstrap." />
  <title>Silambarasan K | Web Developer & UI Developer</title>

  <!-- Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>

  <!-- ═══════════════════════════════════════════════
     NAVBAR
════════════════════════════════════════════════ -->
  <nav id="navbar">
    <div class="navbar-inner">
      <!-- Brand / Logo -->
      <a href="#home" class="navbar-brand" data-nav="home">
        <div class="brand-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
            stroke="hsl(240,15%,4%)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="16 18 22 12 16 6" />
            <polyline points="8 6 2 12 8 18" />
          </svg>
        </div>
        <span class="brand-text">Silambarasan K</span>
      </a>

      <!-- Desktop nav links -->
      <ul class="nav-links mb-0">
        <?php
        $links = [
          'home' => 'Home',
          'about' => 'About',
          'skills' => 'Skills',
          'experience' => 'Experience',
          'projects' => 'Projects',
          'services' => 'Services',
          'contact' => 'Contact'
        ];
        foreach ($links as $id => $label):
          ?>
          <li><a href="#<?= $id ?>" data-nav="<?= $id ?>"><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>

      <!-- Desktop CTA -->
      <a href="#contact" class="btn-hire" data-nav="contact">Hire Me</a>

      <!-- Hamburger -->
      <button class="hamburger" id="hamburger" aria-label="Toggle menu">
        <span></span><span></span><span></span>
      </button>
    </div>

    <!-- Mobile nav -->
    <div class="mobile-nav" id="mobile-nav">
      <ul>
        <?php foreach ($links as $id => $label): ?>
          <li><a href="#<?= $id ?>" data-nav="<?= $id ?>"><?= $label ?></a></li>
        <?php endforeach; ?>
        <li><a href="#contact" class="btn-hire" data-nav="contact">Hire Me</a></li>
      </ul>
    </div>
  </nav>

  <!-- ═══════════════════════════════════════════════
     HERO
════════════════════════════════════════════════ -->
  <section id="home">
    <!-- Background blobs -->
    <div class="hero-blob-1"></div>
    <div class="hero-blob-2"></div>
    <div class="hero-blob-3"></div>

    <!-- Floating skill tags -->
    <?php
    $tags = [
      ['HTML5', 'hsl(25,90%,60%)', '70%', '15%', '0s'],
      ['CSS3', 'hsl(210,80%,60%)', '77%', '24%', '0.4s'],
      ['JavaScript', 'hsl(52,90%,55%)', '80%', '36%', '0.8s'],
      ['Bootstrap', 'hsl(262,80%,65%)', '83%', '48%', '1.2s'],
      ['WordPress', 'hsl(200,60%,60%)', '80%', '61%', '1.6s'],
      ['Angular', 'hsl(0,80%,60%)', '77%', '72%', '2s'],
      ['Designing', 'hsl(0,80%,60%)', '70%', '78%', '2s']
    ];
    foreach ($tags as $t):
      ?>
      <div class="floating-tag" style="left:<?= $t[2] ?>;top:<?= $t[3] ?>;animation-delay:<?= $t[4] ?>">
        <span class="dot" style="background:<?= $t[1] ?>"></span>
        <span><?= $t[0] ?></span>
      </div>
    <?php endforeach; ?>

    <div class="hero-inner">
      <!-- LEFT content -->
      <div class="hero-left reveal">
        <div class="hero-badge">
          <span class="animate-pulse"
            style="width:8px;height:8px;border-radius:50%;background:var(--primary);display:inline-block"></span>
          Available for Work
        </div>

        <h1 class="hero-name">
          Hi, I'm &nbsp; <br> <span class="text-gradient">Silambarasan K</span>
        </h1>

        <!-- Animated title -->
        <div class="hero-title-wrap">
          <?php
          $titles = ['Web Developer', 'UI Developer', 'Frontend Developer', 'Wordpress Developer'];
          foreach ($titles as $t):
            ?>
            <span class="hero-title-item"><?= $t ?></span>
          <?php endforeach; ?>
        </div>

        <p class="hero-desc">
          Passionate front-end developer crafting responsive, visually stunning web experiences using&nbsp;
          <span>HTML5, CSS3, JavaScript &amp; Bootstrap</span>. Turning ideas into elegant digital solutions.
        </p>

        <div class="hero-btns">
          <button class="btn-primary" data-scroll="projects">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
            View Portfolio
          </button>
          <button class="btn-outline" data-scroll="contact">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
              <polyline points="22,6 12,13 2,6" />
            </svg>
            Contact Me
          </button>
        </div>

        <!-- Stats -->
        <div class="hero-stats">
          <?php
          $stats = [['3+', 'Years Experience'], ['20+', 'Projects Done'], ['3', 'Companies']];
          foreach ($stats as $s):
            ?>
            <div>
              <div class="hero-stat-val text-gradient"><?= $s[0] ?></div>
              <div class="hero-stat-lbl"><?= $s[1] ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- RIGHT – Profile image -->
      <div class="hero-right reveal-scale delay-2">
        <div class="profile-ring-wrap">
          <div class="ring-dashed"></div>
          <div class="ring-glow"></div>
          <div class="profile-img-wrap">
            <img src="assets/banner2.png" alt="Silambarasan K – Web Developer" />
          </div>
          <div class="dot-accent-1"></div>
          <div class="dot-accent-2"></div>
        </div>
      </div>
    </div>

    <!-- Scroll indicator -->
    <button class="scroll-indicator" data-scroll="about">
      <span>Scroll</span>
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="12" y1="5" x2="12" y2="19" />
        <polyline points="19 12 12 19 5 12" />
      </svg>
    </button>
  </section>

  <!-- ═══════════════════════════════════════════════
     ABOUT
════════════════════════════════════════════════ -->
  <section id="about" class="section-padding">
    <div class="about-blob"></div>
    <div class="container-portfolio">

      <!-- Header -->
      <div class="section-header reveal">
        <span class="section-tag">Who I Am</span>
        <h2 class="section-title">About <span class="text-gradient">Me</span></h2>
        <div class="section-sep"></div>
      </div>

      <div class="about-grid">
        <!-- Image -->
        <div class="reveal-left">
          <div class="about-img-wrap">
            <div class="about-img-glow"></div>
            <div class="about-img-card">
              <img src="assets/banner2.png" alt="Silambarasan K" />
              <div class="about-img-badge">
                <div class="about-badge-dot"></div>
                <div>
                  <p class="about-badge-name">Silambarasan K</p>
                  <p class="about-badge-sub">Web &amp; UI Developer.</p>
                </div>
              </div>
            </div>
            <div class="about-deco-br"></div>
            <div class="about-deco-tl"></div>
          </div>
        </div>

        <!-- Info cards -->
        <div>
          <!-- Career Objective -->
          <div class="info-card reveal-right delay-1">
            <div class="info-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
              </svg>
            </div>
            <div>
              <h3 class="info-card-title">Career Objective</h3>
              <p class="info-card-text">To leverage my technical expertise in HTML, CSS, JavaScript, and Bootstrap to
                build impactful web solutions, continuously grow as a developer, and contribute meaningfully to
                innovative frontend projects.</p>
            </div>
          </div>

          <!-- Education -->
          <div class="info-card reveal-right delay-2">
            <div class="info-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                <path d="M6 12v5c3 3 9 3 12 0v-5" />
              </svg>
            </div>
            <div>
              <h3 class="info-card-title">Education</h3>
              <p class="info-card-name">Diploma in Computer Engineering</p>
              <p class="info-card-sub">Paavai Polytechnic College, Namakkal</p>
              <p class="info-card-date">2016 – 2018</p>
            </div>
          </div>

          <!-- Languages -->
          <div class="info-card reveal-right delay-3">
            <div class="info-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
              </svg>
            </div>
            <div>
              <h3 class="info-card-title">Languages</h3>
              <div>
                <span class="lang-badge">Tamil</span>
                <span class="lang-badge">English</span>
              </div>
            </div>
          </div>

          <!-- Personal Details -->
          <div class="info-card reveal-right delay-4">
            <div class="info-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </svg>
            </div>
            <div style="flex:1">
              <h3 class="info-card-title">Personal Details</h3>
              <div class="personal-grid">
                <div>
                  <span class="personal-label">Email:</span>
                  <p class="personal-val">silambarasan03.k@gmail.com</p>
                </div>
                <div>
                  <span class="personal-label">Phone:</span>
                  <p class="personal-val">+91 7092799913</p>
                </div>
                <div>
                  <span class="personal-label">Location:</span>
                  <p class="personal-val">Tamil Nadu, India</p>
                </div>
                <div>
                  <span class="personal-label">Status:</span>
                  <p class="text-green">Available</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
     SKILLS
════════════════════════════════════════════════ -->
  <section id="skills" class="section-padding">
    <div class="skills-blob"></div>
    <div class="container-portfolio">

      <div class="section-header reveal">
        <span class="section-tag">What I Know</span>
        <h2 class="section-title">My <span class="text-gradient">Skills</span></h2>
        <div class="section-sep"></div>
      </div>

      <div class="skills-grid">
        <!-- Frontend Tech -->
        <div class="skill-card reveal delay-1">
          <div class="skill-card-head">
            <div class="icon">🎨</div>
            <h3>Frontend Tech</h3>
          </div>
          <?php
          $front = [['HTML5', 90], ['CSS3', 95], ['JavaScript', 80], ['Bootstrap', 88]];
          foreach ($front as [$name, $pct]):
            ?>
            <div class="skill-row">
              <div class="skill-row-head">
                <span class="skill-name"><?= $name ?></span>
                <span class="skill-pct"><?= $pct ?>%</span>
              </div>
              <div class="skill-bar">
                <div class="skill-bar-fill" data-width="<?= $pct ?>"></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Additional Skills -->
        <div class="skill-card reveal delay-2">
          <div class="skill-card-head">
            <div class="icon">⚡</div>
            <h3>Additional Skills</h3>
          </div>
          <?php
          $add = [['WordPress', 90], ['Angular', 40], ['MySQL', 40]];
          foreach ($add as [$name, $pct]):
            ?>
            <div class="skill-row">
              <div class="skill-row-head">
                <span class="skill-name"><?= $name ?></span>
                <span class="skill-pct"><?= $pct ?>%</span>
              </div>
              <div class="skill-bar">
                <div class="skill-bar-fill" data-width="<?= $pct ?>"></div>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="tools-label">Tools &amp; Environment</div>
          <div class="tools-wrap">
            <?php
            $tools = ['Visual Studio Code', 'Windows OS'];
            foreach ($tools as $t):
              ?>
              <span class="tool-chip"><?= $t ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Tech Stack -->
        <div class="skill-card reveal delay-3">
          <div class="skill-card-head">
            <div class="icon">🚀</div>
            <h3>Tech Stack</h3>
          </div>
          <div class="tech-grid">
            <?php
            $techs = [
              ['HTML5', '🌐'],
              ['CSS3', '🎨'],
              ['JavaScript', '⚡'],
              ['Bootstrap', '🅱️'],
              ['WordPress', '📝'],
              ['Angular', '🔺'],
              ['MySQL', '🗄️'],
              ['VS Code', '💻'],
            ];
            foreach ($techs as [$name, $icon]):
              ?>
              <div class="tech-chip">
                <span class="tech-chip-icon"><?= $icon ?></span>
                <span class="tech-chip-name"><?= $name ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
     EXPERIENCE
════════════════════════════════════════════════ -->
  <section id="experience" class="section-padding">
    <div class="exp-blob"></div>
    <div class="container-portfolio">

      <div class="section-header reveal">
        <span class="section-tag">Work History</span>
        <h2 class="section-title">My <span class="text-gradient">Experience</span></h2>
        <div class="section-sep"></div>
      </div>

      <div class="timeline">
        <div class="timeline-line"></div>

        <?php
        $exps = [
          [
            'company' => 'Rosun Natural Products Pvt. Ltd.',
            'role' => 'Web Developer',
            'period' => 'May 2024 – Present',
            'status' => 'Current',
            'desc' => 'Leading UI development and website maintenance. Crafting SEO-friendly, fully responsive page structures and modern UI components. Optimizing site performance and user experience.',
            'skills' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'SEO', 'Responsive Design'],
            'color' => 'hsl(262,80%,65%)',
          ],
          [
            'company' => 'Xmedia Solution',
            'role' => 'Web Developer & WordPress Developer',
            'period' => 'May 2024 – May 2024',
            'status' => 'Previous',
            'desc' => 'Developed and maintained WordPress-based websites. Customized themes, built responsive UI layouts, and delivered client-specific web solutions on time.',
            'skills' => ['WordPress', 'PHP', 'CSS3', 'Bootstrap', 'Theme Development', 'Responsive Design'],
            'color' => 'hsl(200,70%,55%)',
          ],
          [
            'company' => 'Capricorn Softech',
            'role' => 'Web Developer',
            'period' => 'Feb 2023 – May 2024',
            'status' => 'Previous',
            'desc' => 'Built responsive, cross-browser compatible websites using HTML5, CSS3, JavaScript, and Bootstrap. Collaborated with design teams to implement pixel-perfect UI layouts.',
            'skills' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap'],
            'color' => 'hsl(160,60%,50%)',
          ],
        ];
        foreach ($exps as $i => $exp):
          $delay = 'delay-' . ($i + 1);
          ?>
          <div class="exp-item">
            <!-- Timeline dot -->
            <div class="exp-dot-col">
              <div class="exp-dot" style="box-shadow: 0 0 20px <?= $exp['color'] ?>30">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                  <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                </svg>
              </div>
            </div>

            <!-- Content card -->
            <div class="exp-card reveal <?= $delay ?>">
              <div class="exp-top-bar"
                style="background: linear-gradient(90deg,<?= $exp['color'] ?>,<?= $exp['color'] ?>80)"></div>
              <div class="exp-header">
                <div>
                  <h3 class="exp-role"><?= htmlspecialchars($exp['role']) ?></h3>
                  <p class="exp-company"><?= htmlspecialchars($exp['company']) ?></p>
                </div>
                <div style="display:flex;flex-direction:column;align-items:flex-end;gap:8px">
                  <span class="<?= $exp['status'] === 'Current' ? 'exp-badge-current' : 'exp-badge-prev' ?>">
                    <?= $exp['status'] ?>
                  </span>
                  <div class="exp-period">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                      <line x1="16" y1="2" x2="16" y2="6" />
                      <line x1="8" y1="2" x2="8" y2="6" />
                      <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                    <?= $exp['period'] ?>
                  </div>
                </div>
              </div>
              <p class="exp-desc"><?= htmlspecialchars($exp['desc']) ?></p>
              <div class="exp-skills">
                <?php foreach ($exp['skills'] as $sk): ?>
                  <span class="exp-skill"><?= $sk ?></span>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
     PROJECTS
════════════════════════════════════════════════ -->
  <section id="projects" class="section-padding">
    <div class="projects-blob"></div>
    <div class="container-portfolio">

      <div class="section-header reveal">
        <span class="section-tag">My Work</span>
        <h2 class="section-title">Featured <span class="text-gradient">Projects</span></h2>
        <div class="section-sep"></div>
        <p class="section-sub">A showcase of web projects demonstrating my expertise in frontend development and UI
          design.</p>
      </div>

      <div class="projects-grid">
        <?php
        $projects = [
          [
            'title' => 'Rosun Fruits',
            'desc' => 'A modern Static Website for fresh natural fruit products. Features responsive design, product listings, and smooth UI interactions.',
            'tech' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap'],
            'image' => 'assets/project-rosun.jpg',
            'cat' => 'Static Website',
            'color' => 'hsl(25,90%,60%)',
            'url' => 'https://rosunfruits.com/',
          ],
          [
            'title' => 'RRASE',
            'desc' => 'A professional corporate website built on WordPress with custom theme development, optimized for performance and SEO.',
            'tech' => ['WordPress', 'PHP', 'CSS3'],
            'image' => 'assets/project-rrase.jpg',
            'cat' => 'WordPress',
            'color' => 'hsl(200,70%,55%)',
            'url' => 'https://rrase.com/',
          ],
          [
            'title' => 'Prince Jewellery',
            'desc' => 'Luxury jewellery e-commerce site with elegant UI design, product galleries, and a seamless shopping experience.',
            'tech' => ['PHP', 'CSS3', 'JavaScript', 'Bootstrap'],
            'image' => 'assets/project-jewellery.jpg',
            'cat' => 'E-Commerce',
            'color' => 'hsl(48,90%,55%)',
            'url' => 'https://princejewellery.com/',
          ],
          [
            'title' => 'Xmedia Solution',
            'desc' => 'Digital marketing agency website with dynamic sections, portfolio showcase, and service listings built with a custom WordPress theme.',
            'tech' => ['WordPress', 'CSS3', 'Custom Theme'],
            'image' => 'assets/project-mudra.jpg',
            'cat' => 'Agency',
            'color' => 'hsl(262,80%,65%)',
            'url' => 'https://www.xmediasolution.com/',
          ],
          [
            'title' => 'Mudra OOH',
            'desc' => 'Out-of-home advertising agency website showcasing media services, campaign portfolios, and client solutions with a bold visual identity.',
            'tech' => ['WordPress', 'CSS3', 'Custom Theme'],
            'image' => 'assets/project-mudra.jpg',
            'cat' => 'Agency',
            'color' => 'hsl(160,60%,50%)',
            'url' => 'http://mudraooh.com',
          ],
        ];
        foreach ($projects as $i => $p):
          $delay = 'delay-' . ($i + 1);
          ?>
          <div class="project-card reveal <?= $delay ?>">
            <div class="project-img">
              <img src="<?= $p['image'] ?>" alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy" />
              <div class="project-overlay"></div>
              <div class="project-category" style="color:<?= $p['color'] ?>"><?= $p['cat'] ?></div>
              <div class="project-hover-btn">
                <a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" rel="noopener noreferrer"
                  class="project-view-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                    <polyline points="15 3 21 3 21 9" />
                    <line x1="10" y1="14" x2="21" y2="3" />
                  </svg>
                  View Project
                </a>
              </div>
            </div>
            <div class="project-body">
              <div class="project-accent" style="background:<?= $p['color'] ?>"></div>
              <h3 class="project-title"><?= htmlspecialchars($p['title']) ?></h3>
              <p class="project-desc"><?= htmlspecialchars($p['desc']) ?></p>
              <div class="project-chips">
                <?php foreach ($p['tech'] as $t): ?>
                  <span class="project-chip"><?= $t ?></span>
                <?php endforeach; ?>
              </div>
              <a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" rel="noopener noreferrer"
                class="project-live-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10" />
                  <line x1="2" y1="12" x2="22" y2="12" />
                  <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" />
                </svg>
                <?= htmlspecialchars($p['url']) ?>
              </a>
            </div>
            <div class="project-bottom-glow"
              style="background: linear-gradient(90deg, transparent, <?= $p['color'] ?>, transparent)"></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
     SERVICES
════════════════════════════════════════════════ -->
  <section id="services" class="section-padding">
    <div class="services-blob-tr"></div>
    <div class="services-blob-bl"></div>
    <div class="container-portfolio">

      <div class="section-header reveal">
        <span class="section-tag">What I Offer</span>
        <h2 class="section-title">My <span class="text-gradient">Services</span></h2>
        <div class="section-sep"></div>
        <p class="section-sub">Comprehensive frontend solutions tailored to your needs, from design implementation to
          full website delivery.</p>
      </div>

      <div class="services-grid">
        <?php
        $services = [
          [
            'icon' => '<path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/><path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2"/>',
            'title' => 'UI Development',
            'desc' => 'Pixel-perfect, visually stunning user interfaces crafted with modern CSS techniques, animations, and attention to every detail.',
            'tags' => ['CSS3', 'HTML5', 'Animations'],
            'color' => 'hsl(262,80%,65%)',
          ],
          [
            'icon' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
            'title' => 'Frontend Development',
            'desc' => 'Clean, performant frontend code using HTML5, CSS3, JavaScript, and Bootstrap to bring designs to life across all browsers.',
            'tags' => ['JavaScript', 'Bootstrap', 'HTML5'],
            'color' => 'hsl(200,70%,60%)',
          ],
          [
            'icon' => '<rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/>',
            'title' => 'Responsive Design',
            'desc' => 'Fully responsive websites that look and feel perfect on any device — from mobile phones to large desktop screens.',
            'tags' => ['Mobile-First', 'Bootstrap Grid', 'Flexbox'],
            'color' => 'hsl(160,60%,50%)',
          ],
          [
            'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
            'title' => 'Static Website Development',
            'desc' => 'Fast-loading, SEO-optimized static websites built with pure HTML, CSS, JavaScript, and Bootstrap. Perfect for production hosting.',
            'tags' => ['HTML', 'CSS', 'JS', 'Bootstrap'],
            'color' => 'hsl(48,90%,55%)',
          ],
          [
            'icon' => '<circle cx="12" cy="12" r="2"/><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>',
            'title' => 'WordPress Development',
            'desc' => 'Custom WordPress theme development, plugin customization, and content management solutions for businesses of all sizes.',
            'tags' => ['WordPress', 'PHP', 'Themes'],
            'color' => 'hsl(200,60%,60%)',
          ],
          [
            'icon' => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
            'title' => 'Website Maintenance',
            'desc' => 'Ongoing maintenance, performance optimization, bug fixing, and SEO improvements to keep your website running at its best.',
            'tags' => ['SEO', 'Performance', 'Updates'],
            'color' => 'hsl(25,90%,60%)',
          ],
        ];
        foreach ($services as $i => $s):
          $delay = 'delay-' . ($i + 1);
          ?>
          <div class="service-card reveal <?= $delay ?>">
            <div class="service-bg-hover" style="background:<?= $s['color'] ?>"></div>
            <div class="service-icon"
              style="background:<?= $s['color'] ?>18; border: 1px solid <?= $s['color'] ?>30; color:<?= $s['color'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <?= $s['icon'] ?>
              </svg>
            </div>
            <h3 class="service-title"><?= $s['title'] ?></h3>
            <p class="service-desc"><?= $s['desc'] ?></p>
            <div class="service-tags">
              <?php foreach ($s['tags'] as $tag): ?>
                <span class="service-tag"
                  style="background:<?= $s['color'] ?>12; color:<?= $s['color'] ?>; border:1px solid <?= $s['color'] ?>25">
                  <?= $tag ?>
                </span>
              <?php endforeach; ?>
            </div>
            <div class="service-bottom-line"
              style="background: linear-gradient(90deg,transparent,<?= $s['color'] ?>,transparent)"></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
     CONTACT
════════════════════════════════════════════════ -->
  <section id="contact" class="section-padding">
    <div class="contact-blob"></div>
    <div class="container-portfolio">

      <div class="section-header reveal">
        <span class="section-tag">Let's Talk</span>
        <h2 class="section-title">Get In <span class="text-gradient">Touch</span></h2>
        <div class="section-sep"></div>
        <p class="section-sub">Have a project in mind? Let's work together to create something amazing.</p>
      </div>

      <div class="contact-grid">
        <!-- Contact Info -->
        <div class="reveal-left">
          <div class="contact-info-card">
            <h3>Contact Information</h3>
            <p>I'm always open to discussing new projects, creative ideas, or opportunities to be part of your vision.
            </p>

            <a href="mailto:silambarasan03.k@gmail.com" class="contact-link">
              <div class="contact-link-icon"
                style="background:hsl(262 80% 65% / 0.18);border:1px solid hsl(262 80% 65% / 0.3)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="hsl(262,80%,65%)"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                  <polyline points="22,6 12,13 2,6" />
                </svg>
              </div>
              <div>
                <p class="contact-link-label">Email</p>
                <p class="contact-link-val">silambarasan03.k@gmail.com</p>
              </div>
            </a>

            <a href="tel:+917092799913" class="contact-link">
              <div class="contact-link-icon"
                style="background:hsl(160 60% 50% / 0.18);border:1px solid hsl(160 60% 50% / 0.3)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="hsl(160,60%,50%)"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path
                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.36a2 2 0 0 1 1.99-2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 5.4 5.4l1.69-1.69a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7a2 2 0 0 1 1.72 2.02z" />
                </svg>
              </div>
              <div>
                <p class="contact-link-label">Phone</p>
                <p class="contact-link-val">+91 7092799913</p>
              </div>
            </a>

            <div class="contact-link" style="cursor:default">
              <div class="contact-link-icon"
                style="background:hsl(25 90% 60% / 0.18);border:1px solid hsl(25 90% 60% / 0.3)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="hsl(25,90%,60%)"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                  <circle cx="12" cy="10" r="3" />
                </svg>
              </div>
              <div>
                <p class="contact-link-label">Location</p>
                <p class="contact-link-val">Tamil Nadu, India</p>
              </div>
            </div>
          </div>

          <!-- Availability card -->
          <div class="avail-card reveal delay-2">
            <div class="avail-head">
              <div class="avail-dot"></div>
              <span>Available for Work</span>
            </div>
            <p>Currently accepting projects and full-time opportunities in frontend development.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════════════════════════════
     FOOTER
════════════════════════════════════════════════ -->
  <footer>
    <div class="footer-blob"></div>
    <div class="footer-inner">
      <div class="footer-grid">
        <!-- Brand col -->
        <div class="footer-brand">
          <div class="navbar-brand" style="pointer-events:none">
            <div class="brand-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="hsl(240,15%,4%)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="16 18 22 12 16 6" />
                <polyline points="8 6 2 12 8 18" />
              </svg>
            </div>
            <span class="brand-text">Silambarasan K</span>
          </div>
          <p>Web Developer &amp; UI Developer crafting responsive, beautiful web experiences with HTML, CSS, JavaScript
            &amp; Bootstrap.</p>
          <a href="mailto:silambarasan03.k@gmail.com" class="footer-contact-line">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
              <polyline points="22,6 12,13 2,6" />
            </svg>
            silambarasan03.k@gmail.com
          </a>
          <a href="tel:+917092799913" class="footer-contact-line">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.36a2 2 0 0 1 1.99-2.18h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 5.4 5.4l1.69-1.69a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7a2 2 0 0 1 1.72 2.02z" />
            </svg>
            +91 7092799913
          </a>
          <span class="footer-contact-line" style="cursor:default">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
              <circle cx="12" cy="10" r="3" />
            </svg>
            Tamil Nadu, India
          </span>
        </div>

        <!-- Navigation col -->
        <div class="footer-col">
          <h4>Navigation</h4>
          <ul>
            <?php foreach (['home', 'about', 'skills', 'experience'] as $id): ?>
              <li><button data-footer-link="<?= $id ?>"><?= ucfirst($id) ?></button></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Portfolio col -->
        <div class="footer-col">
          <h4>Portfolio</h4>
          <ul>
            <?php foreach (['projects', 'services', 'contact'] as $id): ?>
              <li><button data-footer-link="<?= $id ?>"><?= ucfirst($id) ?></button></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <!-- Bottom bar -->
      <div class="footer-bottom">
        <p class="footer-copy">
          Built with
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" />
          </svg>
          by <span style="color:var(--primary);font-weight:500">Silambarasan K</span>&nbsp;·&nbsp;<?= date('Y') ?>
        </p>
        <button class="btn-top" data-scroll-top aria-label="Back to top">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="19" x2="12" y2="5" />
            <polyline points="5 12 12 5 19 12" />
          </svg>
        </button>
      </div>
    </div>
  </footer>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="js/main.js"></script>
</body>

</html>