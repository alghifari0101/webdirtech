<div class="page-header" style="min-height: 100vh; display: flex; align-items: center; background-image: linear-gradient(rgba(11, 19, 43, 0.9), rgba(11, 19, 43, 0.8)), url('https://images.pexels.com/photos/1181467/pexels-photo-1181467.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
    <div class="container" style="max-width: 480px;">
        <div class="login-card" style="background: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
            <div class="text-center mb-4" style="margin-bottom: 2rem; text-align: center;">
                <h2 style="color: #0b132b; font-weight: 700; margin-bottom: 0.5rem;">Welcome Back</h2>
                <p style="color: #64748b;">Sign in to check your awesome dashboard</p>
            </div>

            <form wire:submit="login">
                <div style="margin-bottom: 1.25rem;">
                    <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem; font-size: 0.875rem;">Email Address</label>
                    <input type="email" wire:model="email" 
                        style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 0.95rem; transition: all 0.2s;"
                        placeholder="name@company.com"
                        class="form-input">
                    @error('email') <span style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem; display: block;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.5rem; font-size: 0.875rem;">Password</label>
                    <input type="password" wire:model="password" 
                        style="width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 0.95rem;"
                        placeholder="••••••••">
                    @error('password') <span style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem; display: block;">{{ $message }}</span> @enderror
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" wire:model="remember" style="border-radius: 4px; width: 16px; height: 16px;">
                        <span style="font-size: 0.875rem; color: #64748b;">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 0.875rem; font-weight: 600; border-radius: 10px;">
                    Sign In
                    <div wire:loading wire:target="login" class="spinner-border spinner-border-sm ms-2" role="status"></div>
                </button>
            </form>
        </div>
    </div>
</div>
