<div>
    <!-- Hero Section -->
    <section class="hero-section" style="padding: 120px 0 60px; background: linear-gradient(135deg, #e11d48 0%, #be123c 100%); position: relative; overflow: hidden;">
        <div style="position: absolute; top: -20%; left: -10%; width: 500px; height: 500px; background: rgba(255,255,255,0.03); border-radius: 50%; filter: blur(100px); pointer-events: none;"></div>
        
        <div class="container" style="position: relative; z-index: 1;">
            <div class="text-center" style="max-width: 800px; margin: 0 auto; color: white;">
                <div style="display: inline-flex; align-items: center; gap: 10px; background: rgba(255,255,255,1); color: #e11d48; padding: 10px 20px; border-radius: 50px; font-size: 0.85rem; font-weight: 800; margin-bottom: 30px; text-transform: uppercase; letter-spacing: 0.1em; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                    <i class="fa-solid fa-circle-question"></i> Detail Jawaban
                </div>
                <h1 style="font-family: 'Outfit', sans-serif; font-size: 3.5rem; font-weight: 800; margin-bottom: 25px; line-height: 1.2; letter-spacing: -0.01em;">Pahami Lebih Dalam</h1>
                
                <div style="display: flex; align-items: center; justify-content: center; gap: 15px; font-size: 1.1rem; opacity: 0.9;">
                    <a href="{{ route('ask') }}" style="color: white; text-decoration: none; border-bottom: 1px solid rgba(255,255,255,0.3);">Pusat Bantuan</a>
                    <span style="opacity: 0.5;">/</span>
                    <span style="font-weight: 600;">Detail</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Question Content -->
    <section style="padding: 100px 0; background-color: #f8fafc;">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto;">
                <div class="ask-card" style="background: white; border-radius: 40px; box-shadow: 0 40px 100px -20px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #f1f5f9;">
                    <div style="padding: 60px;">
                        <div style="display: flex; gap: 40px; align-items: flex-start; margin-bottom: 60px;">
                             <div style="flex-shrink: 0; width: 70px; height: 70px; background: #e11d48; border-radius: 24px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.75rem; box-shadow: 0 20px 40px -10px rgba(225, 29, 72, 0.4);">
                                <i class="fa-solid fa-quote-left"></i>
                            </div>
                            <div>
                                <h1 style="font-family: 'Outfit', sans-serif; font-size: 2.5rem; font-weight: 800; color: #0f172a; margin-bottom: 0; line-height: 1.3;">
                                    {{ $ask->question }}
                                </h1>
                                <p style="margin-top: 15px; color: #94a3b8; font-weight: 500;">Diterbitkan {{ $ask->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        <div style="height: 1px; background: linear-gradient(90deg, #f1f5f9 0%, transparent 100%); margin-bottom: 60px;"></div>

                        <div style="padding: 0 0 0 110px;" class="answer-wrapper">
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 700; color: #1e293b; margin-bottom: 25px; display: flex; align-items: center; gap: 15px;">
                                <span style="display: inline-block; width: 30px; height: 4px; background: #e11d48; border-radius: 2px;"></span> Jawaban Kami
                            </h3>
                            <div style="color: #475569; line-height: 2; font-size: 1.25rem; font-weight: 400;">
                                {!! nl2br(e($ask->answer)) !!}
                            </div>
                            
                            <div style="margin-top: 50px; display: flex; align-items: center; gap: 20px; padding: 25px; background: #f8fafc; border-radius: 24px;">
                                <div style="width: 48px; height: 48px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; color: #64748b;">
                                    <i class="fa-solid fa-user-check"></i>
                                </div>
                                <div>
                                    <p style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #1e293b;">Tim Teknis Dirtech</p>
                                    <p style="margin: 0; font-size: 0.85rem; color: #94a3b8;">Terakhir diperbarui {{ $ask->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="padding: 30px 60px; background: #1e293b; display: flex; justify-content: space-between; align-items: center;">
                        <a href="{{ route('ask') }}" style="color: rgba(255,255,255,0.7); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 10px; transition: color 0.2s ease;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.7)'">
                            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                        <div style="display: flex; gap: 20px;">
                            <button onclick="navigator.clipboard.writeText(window.location.href); alert('Link berhasil disalin!')" style="border: 1px solid rgba(255,255,255,0.2); background: transparent; color: white; padding: 10px 25px; border-radius: 14px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 10px; transition: all 0.2s ease;" onmouseover="this.style.background='rgba(255,255,255,0.05)'" onmouseout="this.style.background='transparent'">
                                <i class="fa-solid fa-share-nodes"></i> Bagikan
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
