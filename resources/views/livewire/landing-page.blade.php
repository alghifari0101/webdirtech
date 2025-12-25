<div>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto">
            <div class="hero-grid">
                <!-- Left: Content -->
                <div class="hero-content">
                    <div style="font-weight: 800; color: var(--accent); text-transform: uppercase; letter-spacing: 0.15em; font-size: 0.9rem; margin-bottom: 20px;">Solusi Digital Terpadu</div>
                    <h1 class="hero-title">
                        Partner Terbaik <br>Transformasi Digital <span class="accent-text">Bisnis Anda</span>
                    </h1>
                    <p class="hero-description">
                        Kami menyediakan layanan infrastruktur server, pembuatan website profesional, dan optimasi digital untuk pertumbuhan bisnis Anda.
                    </p>
                    
                    <div class="hero-actions">
                        <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="btn-premium">
                            <i class="fa-solid fa-comments"></i> Konsultasi Gratis
                        </a>
                        <a href="#services" class="link-work">
                            Pelajari Layanan <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <h3>50+</h3>
                            <p>Projects Completed</p>
                        </div>
                        <div class="stat-item">
                            <h3>8+</h3>
                            <p>Years Experience</p>
                        </div>
                        <div class="stat-item">
                            <h3>98%</h3>
                            <p>Client Satisfaction</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Visuals -->
                <div class="hero-visual">
                    <div class="floating-card">
                        <img src="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="Work Preview" width="1200" height="800" fetchpriority="high" style="width: 100%; height: auto; border-radius: 20px; box-shadow: 0 30px 60px rgba(0,0,0,0.05);">
                    </div>
                    
                    <!-- Floating UI 1: Dashboard Dark (Overlapping image) -->
                    <div class="floating-ui-1">
                        <div style="display: flex; gap: 8px; margin-bottom: 20px;">
                            <div style="width: 10px; height: 10px; background: #ef4444; border-radius: 50%;"></div>
                            <div style="width: 10px; height: 10px; background: #f59e0b; border-radius: 50%;"></div>
                            <div style="width: 10px; height: 10px; background: #10b981; border-radius: 50%;"></div>
                        </div>
                        <div style="height: 12px; width: 90%; background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 12px;"></div>
                        <div style="height: 12px; width: 70%; background: rgba(255,255,255,0.1); border-radius: 6px; margin-bottom: 25px;"></div>
                        <div style="height: 8px; width: 100%; background: rgba(255,255,255,0.05); border-radius: 4px; margin-bottom: 10px;"></div>
                        <div style="height: 8px; width: 85%; background: rgba(255,255,255,0.05); border-radius: 4px;"></div>
                    </div>

                    <!-- Floating UI 2: Live Preview Badge -->
                    <div class="floating-ui-2">
                        <div class="status-dot"></div>
                        <span style="font-weight: 800; font-size: 1rem; color: #0f172a; letter-spacing: -0.01em;">Live Preview</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted By Section -->
    <section class="trusted-section">
        <div class="container mx-auto">
            <div class="trusted-label">Trusted By Enterprise Clients</div>
            <div class="trusted-logos">
                <span>TECH CORP</span>
                <span>GLOBAL IND</span>
                <span>SOLUTIONS</span>
                <span>ENTERPRISE</span>
                <span>FUTURE IT</span>
            </div>
        </div>
    </section>

    <!-- Features/Cards Section -->
    <section id="services" class="features-section">
        <div class="container mx-auto">
            <div class="features-grid" style="grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));">
                <!-- Service 1 -->
                <a href="{{ route('service.vps') }}" class="feature-card block group hover:no-underline">
                    <div class="feature-icon group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-terminal"></i>
                    </div>
                    <h3>Jasa Install VPS</h3>
                    <p>Setup dan konfigurasi server VPS yang aman dan optimal untuk aplikasi Anda.</p>
                </a>

                <!-- Service 2 -->
                <a href="{{ route('service.website') }}" class="feature-card block group hover:no-underline">
                    <div class="feature-icon group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-code"></i>
                    </div>
                    <h3>Pembuatan Website</h3>
                    <p>Website responsif dan modern untuk meningkatkan kredibilitas bisnis.</p>
                </a>

                <!-- Service 3 -->
                <a href="{{ route('service.migration') }}" class="feature-card block group hover:no-underline">
                    <div class="feature-icon group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    </div>
                    <h3>Migrasi Website</h3>
                    <p>Pindahkan website Anda ke hosting baru tanpa downtime dan error.</p>
                </a>

                 <!-- Service 4 -->
                <a href="{{ route('service.gmb') }}" class="feature-card block group hover:no-underline">
                    <div class="feature-icon group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <h3>Jasa Pembuatan Google Bisnis</h3>
                    <p>Optimasi profil bisnis agar mudah ditemukan pelanggan di sekitar Anda.</p>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container mx-auto">
            <div class="about-grid">
                <!-- Images Left -->
                <div class="about-images">
                    <div class="about-img-card">
                        <img src="https://images.pexels.com/photos/3182812/pexels-photo-3182812.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Diskusi Tim">
                    </div>
                    <div class="about-img-card">
                        <img src="https://images.pexels.com/photos/3756679/pexels-photo-3756679.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Professional IT">
                    </div>
                </div>

                <!-- Content Right -->
                <div class="about-content">
                    <span class="about-subtitle">Tentang Dirtech</span>
                    <h2>Solusi IT Terpercaya untuk Kesuksesan Bisnis</h2>
                    <p class="description">
                        Kami berdedikasi untuk memberikan layanan teknologi terbaik yang membantu bisnis Anda berkembang lebih cepat, aman, dan efisien di era digital.
                    </p>
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all mt-4">
                        Selengkapnya Tentang Kami <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <div class="about-features">
                        <div class="mini-feature">
                            <div class="mini-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <h4>Keamanan Terjamin</h4>
                            <p>Prioritas utama pada keamanan data dan infrastruktur Anda.</p>
                        </div>
                        <div class="mini-feature">
                            <div class="mini-icon">
                                <i class="fa-solid fa-headset"></i>
                            </div>
                            <h4>Support 24/7</h4>
                            <p>Tim teknis kami siap membantu kendala Anda kapan saja.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section class="faq-section" style="background-color: #fff;">
        <div class="container mx-auto">
            <div class="section-center-header text-center mb-5">
                <span class="about-subtitle">FAQ</span>
                <h2>Pertanyaan Umum</h2>
                <p>Jawaban untuk pertanyaan yang sering diajukan</p>
            </div>
            
            <div class="faq-list" style="max-width: 800px; margin: 0 auto;">
                <!-- Item 1 -->
                <div class="faq-item" x-data="{ open: false }">
                    <div class="faq-question" @click="open = !open">
                        <h4>Berapa lama proses pembuatan website?</h4>
                        <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
                    </div>
                    <div class="faq-answer" x-show="open" x-collapse>
                        <p>Waktu pengerjaan bervariasi tergantung kompleksitas. Untuk Landing Page biasanya 3-5 hari kerja, sedangkan Company Profile membutuhkan 1-2 minggu.</p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="faq-item" x-data="{ open: false }">
                    <div class="faq-question" @click="open = !open">
                        <h4>Apakah bisa custom request spesifikasi VPS?</h4>
                        <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
                    </div>
                    <div class="faq-answer" x-show="open" x-collapse>
                        <p>Tentu saja. Kami menyediakan paket Enterprise dimana Anda bisa menentukan sendiri resource dan konfigurasi server sesuai kebutuhan aplikasi Anda.</p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="faq-item" x-data="{ open: false }">
                    <div class="faq-question" @click="open = !open">
                        <h4>Apakah ada garansi atau support setelah project selesai?</h4>
                        <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
                    </div>
                    <div class="faq-answer" x-show="open" x-collapse>
                        <p>Ya, kami memberikan garansi maintenance gratis selama 1 bulan setelah project selesai untuk memastikan semuanya berjalan lancar.</p>
                    </div>
                </div>
                
                 <!-- Item 4 -->
                 <div class="faq-item" x-data="{ open: false }">
                    <div class="faq-question" @click="open = !open">
                        <h4>Apakah dibantu migrasi dari hosting lama?</h4>
                        <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
                    </div>
                    <div class="faq-answer" x-show="open" x-collapse>
                        <p>Benar, layanan Migrasi Website kami mencakup pemindahan semua file dan database dari hosting lama ke server baru tanpa kehilangan data.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section" style="background-color: #f8fafc;">
        <div class="container mx-auto">
            <div class="section-center-header text-center mb-5">
                <span class="about-subtitle">Testimoni</span>
                <h2>Apa Kata Mereka?</h2>
                <p>Pengalaman mitra kami setelah menggunakan layanan Dirtech</p>
            </div>
            
            <div class="features-grid">
                <!-- Review 1 -->
                <div class="testimonial-card">
                    <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                    <p class="review-text">"Layanan setup VPS-nya sangat memuaskan. Server stabil dan aman, support-nya juga sangat responsif membantu migrasi data kami."</p>
                    <div class="reviewer-profile">
                        <img src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Client 1">
                        <div>
                            <h4>Budi Santoso</h4>
                            <p>CEO, TechStartup.id</p>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="testimonial-card">
                    <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                    <p class="review-text">"Website baru kami terlihat sangat profesional dan cepat. Traffic pengunjung meningkat signifikan sejak redesign dengan tim Dirtech."</p>
                    <div class="reviewer-profile">
                        <img src="https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Client 2">
                        <div>
                            <h4>Sari Rahayu</h4>
                            <p>Owner, BatikModern</p>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="testimonial-card">
                    <div class="quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                    <p class="review-text">"Sangat terbantu dengan jasa Google Bisnis-nya. Toko kami jadi mudah ditemukan di Maps dan review pelanggan jadi lebih termanage."</p>
                    <div class="reviewer-profile">
                        <img src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Client 3">
                        <div>
                            <h4>Agus Wijaya</h4>
                            <p>Manager, Cafe KopiLokal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container mx-auto">
            <h2>Siap Mendigitalkan Bisnis Anda?</h2>
            <p>Konsultasikan kebutuhan teknologi Anda bersama tim ahli kami sekarang juga.</p>
            <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="btn btn-white">Hubungi Kami via WhatsApp</a>
        </div>
    </section>
</div>
