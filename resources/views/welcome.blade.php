<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELTA_AVTOMAKTAB_UZ // YHQ Imtihon Testi</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vue 3 CDN (Composition API) -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        html, body {
            overflow-x: hidden;
            max-width: 100vw;
            width: 100%;
            background-color: #f8fafc;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
            letter-spacing: -0.011em;
        }

        #app {
            overflow-x: hidden;
            max-width: 100vw;
            width: 100%;
        }

        .timer-circle {
            transition: stroke-dashoffset 1s linear;
        }

        /* Minimalist Modern Card System */
        .card-3d {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #e2e8f0;
            border-radius: 1.5rem;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.03), 0 2px 6px -1px rgba(0, 0, 0, 0.02);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .card-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px -4px rgba(0, 0, 0, 0.06);
            border-color: #cbd5e1;
        }

        /* Minimalist Button System */
        .btn-3d {
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            border-radius: 1rem;
        }

        .btn-3d:hover:not(:disabled) {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px -2px rgba(0, 0, 0, 0.08);
        }

        .btn-3d:active:not(:disabled) {
            transform: translateY(0);
        }

        .btn-3d-blue {
            background: #0066cc;
            border: 1px solid #0052a3;
            box-shadow: 0 4px 14px rgba(0, 102, 204, 0.25);
            color: white;
        }

        .btn-3d-blue:hover:not(:disabled) {
            background: #0052a3;
        }

        /* Minimalist Pagination Keys */
        .key-3d {
            position: relative;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
            color: #334155;
            transition: all 0.15s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .key-3d:hover:not(:disabled) {
            background: #f1f5f9;
            border-color: #cbd5e1;
            transform: translateY(-1px);
        }

        .key-3d:active:not(:disabled) {
            transform: translateY(0);
        }

        .key-3d-active {
            background: #0066cc !important;
            border-color: #0052a3 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(0, 102, 204, 0.3) !important;
        }

        .key-3d-correct {
            background: #10b981 !important;
            border-color: #059669 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3) !important;
        }

        .key-3d-incorrect {
            background: #ef4444 !important;
            border-color: #dc2626 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3) !important;
        }

        /* ==================== DARK THEME RULES ==================== */
        html.dark-theme, 
        .dark-theme body,
        .dark-theme {
            background-color: #0f172a !important; /* slate-900 */
            color: #f8fafc !important;
        }

        .dark-theme header {
            background-color: #1e293b !important;
            border-color: #334155 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2) !important;
        }

        .dark-theme header span.text-\[\#0066cc\] {
            color: #3b82f6 !important; /* lighter blue for logo */
        }

        .dark-theme .card-3d, 
        .dark-theme .bg-white,
        .dark-theme .bg-slate-50,
        .dark-theme .bg-slate-50\/50,
        .dark-theme .bg-gray-50,
        .dark-theme .bg-gray-100\/70,
        .dark-theme aside {
            background-color: #1e293b !important; /* slate-800 */
            border-color: #334155 !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3) !important;
        }

        .dark-theme .bg-emerald-100,
        .dark-theme .bg-emerald-50\/50,
        .dark-theme .bg-emerald-50,
        .dark-theme .bg-emerald-100\/60,
        .dark-theme .bg-emerald-100\/50 {
            background-color: rgba(16, 185, 129, 0.22) !important;
            border-color: rgba(16, 185, 129, 0.3) !important;
            color: #34d399 !important;
        }
        
        .dark-theme .bg-red-100,
        .dark-theme .bg-rose-100,
        .dark-theme .bg-rose-50\/50,
        .dark-theme .bg-rose-50,
        .dark-theme .bg-red-100\/60,
        .dark-theme .bg-red-100\/50,
        .dark-theme .bg-red-50 {
            background-color: rgba(239, 68, 68, 0.22) !important;
            border-color: rgba(239, 68, 68, 0.3) !important;
            color: #f87171 !important;
        }
        
        .dark-theme .bg-blue-50\/50,
        .dark-theme .bg-blue-50,
        .dark-theme .bg-blue-100\/60,
        .dark-theme .bg-blue-100\/50 {
            background-color: rgba(59, 130, 246, 0.22) !important;
            border-color: rgba(59, 130, 246, 0.3) !important;
            color: #60a5fa !important;
        }

        .dark-theme .bg-purple-50\/50,
        .dark-theme .bg-purple-50,
        .dark-theme .bg-purple-100\/60,
        .dark-theme .bg-purple-100\/50 {
            background-color: rgba(168, 85, 247, 0.22) !important;
            border-color: rgba(168, 85, 247, 0.3) !important;
            color: #c084fc !important;
        }

        .dark-theme h2,
        .dark-theme h3,
        .dark-theme p:not(.text-amber-600):not(.text-emerald-600):not(.text-red-500):not(.text-rose-600):not(.text-blue-600):not(.text-emerald-500):not(.text-rose-500):not(.text-blue-500),
        .dark-theme span:not(.text-emerald-600):not(.text-red-500):not(.text-emerald-500):not(.text-rose-500):not(.text-amber-600):not(.text-rose-600):not(.text-blue-600):not(.text-blue-500),
        .dark-theme label,
        .dark-theme td,
        .dark-theme th {
            color: #e2e8f0 !important;
        }

        /* Warning alerts and indicators in dark theme */
        .dark-theme .bg-amber-50,
        .dark-theme .bg-amber-50\/50,
        .dark-theme .bg-yellow-50,
        .dark-theme .bg-amber-100,
        .dark-theme .bg-amber-200\/50 {
            background-color: rgba(245, 158, 11, 0.22) !important;
            border-color: rgba(245, 158, 11, 0.25) !important;
            color: #fbbf24 !important;
        }
        
        .dark-theme p.text-amber-600,
        .dark-theme span.text-amber-600,
        .dark-theme .text-amber-600 {
            color: #fbbf24 !important; /* bright amber/yellow */
        }

        .dark-theme .text-emerald-900,
        .dark-theme .text-emerald-800,
        .dark-theme .text-emerald-700,
        .dark-theme .text-emerald-600,
        .dark-theme .text-emerald-500,
        .dark-theme .text-green-600,
        .dark-theme .text-green-500 {
            color: #34d399 !important;
        }

        .dark-theme .text-amber-900,
        .dark-theme .text-amber-800,
        .dark-theme .text-amber-700,
        .dark-theme .text-amber-600 {
            color: #fbbf24 !important;
        }

        .dark-theme .text-blue-900,
        .dark-theme .text-blue-800,
        .dark-theme .text-blue-700,
        .dark-theme .text-blue-600,
        .dark-theme .text-blue-500 {
            color: #60a5fa !important;
        }
        
        .dark-theme .text-red-600,
        .dark-theme .text-red-500,
        .dark-theme .text-rose-600,
        .dark-theme .text-rose-500 {
            color: #f87171 !important;
        }

        .dark-theme code,
        .dark-theme .bg-gray-200,
        .dark-theme .bg-slate-200,
        .dark-theme .bg-slate-300,
        .dark-theme .bg-slate-100,
        .dark-theme .bg-gray-100 {
            background-color: #334155 !important; /* slate-700 dark background */
            color: #f8fafc !important; /* white high-contrast text */
            border: 1px solid #475569 !important;
        }

        .dark-theme .bg-slate-200:hover,
        .dark-theme .bg-slate-300:hover,
        .dark-theme .bg-slate-100:hover,
        .dark-theme .bg-gray-200:hover,
        .dark-theme .bg-gray-100:hover {
            background-color: #475569 !important;
            color: #ffffff !important;
        }

        .dark-theme .grade-delete-btn {
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #f87171 !important;
        }
        
        .dark-theme .grade-delete-btn:hover {
            background-color: #ef4444 !important;
            color: #ffffff !important;
        }

        .dark-theme .text-slate-900,
        .dark-theme .text-slate-800,
        .dark-theme .text-slate-700,
        .dark-theme .text-slate-600,
        .dark-theme .text-gray-900,
        .dark-theme .text-gray-800,
        .dark-theme .text-gray-700,
        .dark-theme .text-gray-600 {
            color: #f8fafc !important;
        }

        .dark-theme .text-gray-500,
        .dark-theme .text-gray-400,
        .dark-theme .text-slate-500,
        .dark-theme .text-slate-400 {
            color: #cbd5e1 !important;
        }

        .dark-theme input,
        .dark-theme select,
        .dark-theme textarea {
            background-color: #0f172a !important;
            border: 1.5px solid #475569 !important;
            color: #ffffff !important;
        }

        .dark-theme input:focus,
        .dark-theme select:focus,
        .dark-theme textarea:focus {
            border-color: #38bdf8 !important;
            box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.25) !important;
        }

        .dark-theme input::placeholder,
        .dark-theme textarea::placeholder {
            color: #94a3b8 !important;
            opacity: 1 !important;
        }

        .dark-theme .from-emerald-50\/80,
        .dark-theme .to-teal-50\/50,
        .dark-theme .from-emerald-50,
        .dark-theme .to-teal-50,
        .dark-theme .bg-gradient-to-br {
            background: #1e293b !important;
            border-color: #334155 !important;
        }

        .dark-theme .bg-slate-100\/70,
        .dark-theme .bg-slate-100 {
            background-color: #0f172a !important;
            color: #f8fafc !important;
        }

        .dark-theme .btn-3d:not(.bg-rose-600):not(.bg-emerald-600):not(.bg-amber-500):not(.btn-3d-blue) {
            background-color: #1e293b !important;
            border-color: #334155 !important;
            color: #e2e8f0 !important;
        }

        .dark-theme .btn-3d:hover:not(.bg-rose-600):not(.bg-emerald-600):not(.bg-amber-500):not(.btn-3d-blue) {
            background-color: #334155 !important;
        }

        .dark-theme .border-gray-200,
        .dark-theme .border-gray-200\/80,
        .dark-theme .border-gray-100 {
            border-color: #334155 !important;
        }

        .dark-theme .question-illustration-container {
            background-color: #0f172a !important; /* slate-900 */
            border-color: #1e293b !important;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.6) !important;
        }

        .dark-theme .bg-gray-100 {
            background-color: #334155 !important; /* slate-700 */
        }

        .dark-theme .bg-gray-100:hover,
        .dark-theme .hover\:bg-gray-200\/70:hover {
            background-color: #475569 !important; /* slate-600 */
            color: #ffffff !important;
        }

        /* Bo'rtib chiqqan tugma/karta uchun */
        .neumorphic-card {
            background: #E0E5EC;
            box-shadow: 9px 9px 16px #a3b1c6,
                        -9px -9px 16px #ffffff;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        /* Ichkariga botgan (inset) element uchun */
        .neumorphic-input {
            background: #E0E5EC;
            box-shadow: inset 3px 3px 6px #b8b9be,
                        inset -3px -3px 6px #ffffff;
            transition: all 0.3s ease;
        }

        .neumorphic-input:focus {
            box-shadow: inset 2px 2px 4px #b8b9be,
                        inset -2px -2px 4px #ffffff;
            outline: none;
        }

        /* Dark theme neumorphic elements */
        .dark-theme .neumorphic-card {
            background: #0f172a;
            box-shadow: 8px 8px 16px #060a12,
                        -8px -8px 16px #182442;
        }

        .dark-theme .neumorphic-input {
            background: #0f172a;
            box-shadow: inset 3px 3px 6px #060a12,
                        inset -3px -3px 6px #182442;
        }

        .dark-theme .neumorphic-input:focus {
            box-shadow: inset 2px 2px 4px #060a12,
                        inset -2px -2px 4px #182442;
        }

        /* Neumorphic Active Button */
        .btn-neumorphic {
            background: #E0E5EC;
            box-shadow: 6px 6px 10px #a3b1c6,
                        -6px -6px 10px #ffffff;
            border-radius: 12px;
            font-weight: bold;
            color: #1e293b;
            transition: all 0.2s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .btn-neumorphic:hover {
            color: #0f172a;
            box-shadow: 3px 3px 6px #a3b1c6,
                        -3px -3px 6px #ffffff;
        }

        .btn-neumorphic:active {
            box-shadow: inset 4px 4px 6px #a3b1c6,
                        inset -4px -4px 6px #ffffff;
        }

        /* Dark mode for neumorphic button */
        .dark-theme .btn-neumorphic {
            background: #0f172a;
            box-shadow: 6px 6px 10px #060a12,
                        -6px -6px 10px #182442;
            color: #cbd5e1;
        }

        .dark-theme .btn-neumorphic:hover {
            color: #ffffff;
            box-shadow: 3px 3px 6px #060a12,
                        -3px -3px 6px #182442;
        }

        .dark-theme .btn-neumorphic:active {
            box-shadow: inset 4px 4px 6px #060a12,
                        inset -4px -4px 6px #182442;
        }
    </style>
</head>
<body class="bg-gray-50/50 min-h-screen flex flex-col justify-between">

    <div id="app" v-cloak :class="{ 'dark-theme': isDarkMode }" class="flex flex-col min-h-screen justify-between transition-colors duration-200">
        
        <!-- ==================== HEADER ==================== -->
        <header class="bg-white dark:bg-slate-900 border-b border-gray-200/80 dark:border-slate-800 py-3 px-3 md:px-6 sticky top-0 z-50 shadow-sm max-w-full overflow-hidden">
            <div class="max-w-full mx-auto flex items-center justify-between gap-2">
                <!-- Logo -->
                <div class="flex items-center gap-2 md:gap-3 min-w-0">
                    <svg width="32" height="32" viewBox="0 0 100 100" class="drop-shadow-sm shrink-0 md:w-[40px] md:h-[40px]">
                        <polygon points="50,5 10,85 90,85" fill="#0066cc" />
                        <text x="50" y="70" fill="#ffffff" font-family="'Inter', sans-serif" font-weight="900" font-size="54" text-anchor="middle">A</text>
                    </svg>
                    <span class="text-[#0066cc] font-black text-sm md:text-2xl tracking-tighter select-none truncate">DELTA_AVTOMAKTAB</span>
                </div>

                <!-- Live Status & Admin Toggle -->
                <div class="flex items-center gap-1.5 md:gap-3 text-xs font-mono text-gray-500 shrink-0">
                    <div class="hidden sm:flex items-center gap-1.5 text-[10px] md:text-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                        <span>ON-LINE</span>
                    </div>

                    <!-- Dark Mode Toggle Button -->
                    <button 
                        @click="isDarkMode = !isDarkMode" 
                        class="btn-3d flex items-center justify-center p-1.5 rounded-xl border border-gray-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-gray-50 transition-all cursor-pointer shadow-sm w-7 h-7 md:w-8 md:h-8 text-xs"
                        title="Mavzuni o'zgartirish"
                    >
                        <span>[[ isDarkMode ? '☀️' : '🌙' ]]</span>
                    </button>

                    <!-- Display logout and profile name if logged in -->
                    <div v-if="isLoggedIn" class="flex items-center gap-1.5 md:gap-2">
                        
                        <!-- Admin Mode Toggle Button -->
                        <button 
                            v-if="loggedInUserType === 'admin'"
                            @click="triggerAdminPanelToggle" 
                            class="btn-3d px-2 py-1 md:px-3.5 md:py-2 rounded-xl font-extrabold transition-all text-[10px] md:text-xs flex items-center gap-1 shadow-md"
                            :class="isAdminMode ? 'bg-amber-500 hover:bg-amber-600 text-white border-b-2 md:border-b-4 border-b-amber-700' : 'bg-[#0066cc] text-white hover:bg-blue-700 border-b-2 md:border-b-4 border-b-blue-800'"
                            :title="isAdminMode ? 'O\'quvchi va Test rejimiga o\'tish' : 'Admin boshqaruv paneliga qaytish'"
                        >
                            <span v-if="isAdminMode">🏠 TEST</span>
                            <span v-else>⚙️ ADMIN</span>
                        </button>

                        <!-- Logout Button -->
                        <button 
                            @click="handleLogout"
                            class="btn-3d px-2 py-1 md:px-3 md:py-2 rounded-xl font-extrabold bg-rose-600 text-white hover:bg-rose-700 border-b-2 md:border-b-4 border-b-rose-800 transition-all text-[10px] md:text-xs flex items-center gap-1 shadow-md"
                            title="Tizimdan to'liq chiqish"
                        >
                            🚪 CHIQISH
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- ==================== MAIN CONTENT ==================== -->
        
        <!-- ==================== LOGIN WORKSPACE ==================== -->
        <div v-if="!isLoggedIn" class="max-w-md mx-auto my-auto px-6 py-12 flex-grow w-full flex flex-col justify-center items-center bg-[#E0E5EC] dark:bg-slate-900 rounded-3xl shadow-2xl transition-all duration-300">
            <div class="neumorphic-card p-8 w-full text-center flex flex-col gap-6 border-none">
                <div class="w-16 h-16 neumorphic-input rounded-full flex items-center justify-center text-3xl mx-auto border-none">
                    🔑
                </div>
                <div class="space-y-1">
                    <h2 class="text-2xl font-black text-slate-800 dark:text-slate-100 tracking-tight">TIZIMGA KIRISH</h2>
                    <p class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">DELTA_AVTOMAKTAB_UZ PORTALI</p>
                </div>
                
                <!-- Unified Login Form -->
                <form @submit.prevent="handleLogin" class="flex flex-col gap-4 text-left" autocomplete="off">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Foydalanuvchi nomi (Login)</label>
                        <input 
                            type="text" 
                            v-model="authUsername" 
                            placeholder="Loginni kiriting" 
                            class="neumorphic-input p-3.5 rounded-xl text-xs text-slate-800 dark:text-slate-100 font-semibold focus:outline-none w-full border-none"
                            required
                            autocomplete="off"
                        />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Maxfiy parol</label>
                        <input 
                            type="password" 
                            v-model="authPassword" 
                            placeholder="Parolingizni kiriting" 
                            class="neumorphic-input p-3.5 rounded-xl text-xs text-slate-800 dark:text-slate-100 font-semibold focus:outline-none w-full border-none"
                            required
                            autocomplete="new-password"
                        />
                    </div>
                    
                    <div v-if="authError" class="p-3 bg-red-500/10 border border-red-500/20 rounded-xl text-red-600 dark:text-red-400 text-xs font-bold text-center">
                        [[ authError ]]
                    </div>
                    
                    <button 
                        type="submit"
                        class="btn-neumorphic w-full py-3.5 text-xs font-extrabold shadow-md transition-all border-none"
                    >
                        TIZIMGA KIRISH
                    </button>
                </form>
                
                <button 
                    @click="openMobileAccessModal" 
                    type="button"
                    class="btn-neumorphic w-full py-3.5 text-xs font-extrabold transition-all border-none flex items-center justify-center gap-2 mt-2"
                >
                    📱 TELEFONDAN KIRISH (QR CODE)
                </button>
            </div>
        </div>

        <!-- ==================== AUTHENTICATED WORKSPACE ==================== -->
        <template v-else>
        
        <!-- ==================== ADMIN PANEL WORKSPACE ==================== -->
        <div v-if="loggedInUserType === 'admin' && isAdminMode" class="max-w-full mx-auto px-4 md:px-8 py-8 flex-grow w-full flex flex-col md:flex-row gap-6">
            
            <!-- Sidebar (Left navigation) -->
            <aside class="w-full md:w-96 flex flex-col gap-3">
                <div class="card-3d p-6 rounded-2xl flex flex-col gap-4 min-h-[500px]">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider px-4 py-1">// MENU</span>
                    
                    <button 
                        @click="activeAdminTab = 'dashboard'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'dashboard' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        📊 DASHBOARD
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'hamkorlar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'hamkorlar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        🤝 HAMKORLAR
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'oquvchilar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'oquvchilar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        🎓 O'QUVCHILAR
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'hisobotlar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'hisobotlar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        📊 TEST HISOBOTLARI
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'xodimlar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'xodimlar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        🧑‍🏫 O'QITUVCHILAR
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'moliya'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'moliya' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        💰 MOLIYA & KIRIM
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'obunalar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'obunalar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        👥 OBUNALAR & STATUS
                    </button>

                    <button 
                        @click="activeAdminTab = 'menejer'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'menejer' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        💼 MENEJER PANELI
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'savollar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'savollar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        ➕ TEST QO'SHISH
                    </button>
                    
                    <button 
                        @click="activeAdminTab = 'sozlamalar'" 
                        class="w-full text-left px-5 py-5 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                        :class="activeAdminTab === 'sozlamalar' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                    >
                        ⚙️ SOZLAMALAR
                    </button>
                </div>
            </aside>

            <!-- Main Content Area -->
            <main class="flex-grow flex flex-col gap-6">
                
                <!-- ==================== TAB: DASHBOARD ==================== -->
                <div v-if="activeAdminTab === 'dashboard'" class="flex flex-col gap-6">
                    <div class="card-3d p-6 rounded-3xl">
                        <h2 class="text-xl font-extrabold text-slate-800 mb-2">HAYDOVCHILIK MAKTABI BOSHQARUVI</h2>
                        <p class="text-xs text-gray-500 font-mono">Bugungi sana: 2026-07-08 // Avtomatlashtirilgan Hisobot tizimi</p>
                    </div>

                    <!-- 3D Stat Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="card-3d p-5 rounded-2xl flex flex-col justify-between border-b-[5px] border-b-blue-500">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide">Jami O'quvchilar</span>
                            <span class="text-3xl font-black text-slate-800 my-2">[[ studentsList.length ]] ta</span>
                            <span class="text-[10px] text-emerald-500 font-semibold">📈 +4 ta yangi (ushbu oy)</span>
                        </div>
                        <div class="card-3d p-5 rounded-2xl flex flex-col justify-between border-b-[5px] border-b-emerald-500">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide">Faol Hamkorlar</span>
                            <span class="text-3xl font-black text-slate-800 my-2">[[ partnersList.length ]] ta</span>
                            <span class="text-[10px] text-gray-500 font-semibold">🤝 Hamkorlik shartnomalari</span>
                        </div>
                        <div class="card-3d p-5 rounded-2xl flex flex-col justify-between border-b-[5px] border-b-purple-500">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide">O'qituvchilar & Xodimlar</span>
                            <span class="text-3xl font-black text-slate-800 my-2">[[ staffList.length ]] ta</span>
                            <span class="text-[10px] text-gray-500 font-semibold">🧑‍🏫 3 xil to'lov modeli</span>
                        </div>
                        <div class="card-3d p-5 rounded-2xl flex flex-col justify-between border-b-[5px] transition-all duration-200" :class="financeSummary.profit >= 0 ? 'border-b-emerald-500' : 'border-b-rose-500'">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide">Kassa Balansi (Net)</span>
                            <span class="text-3xl font-black my-2 font-mono" :class="financeSummary.profit >= 0 ? 'text-emerald-600' : 'text-rose-500'">[[ formatMoney(financeSummary.profit) ]]</span>
                            <span class="text-[10px] text-gray-500 font-semibold">💰 Kirim - Chiqim ko'rsatkichi</span>
                        </div>
                    </div>

                    <!-- Quick View Charts / Summary Panels -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Moliya Qisqa Ko'rinish -->
                        <div class="card-3d p-6 rounded-3xl flex flex-col justify-between min-h-[180px]">
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase mb-4">// MOLIYA DASTURI</h3>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center text-xs border-b border-gray-100 pb-2">
                                        <span class="text-gray-500">Umumiy Kirim:</span>
                                        <span class="font-bold text-emerald-600 font-mono">[[ formatMoney(financeSummary.kirim) ]]</span>
                                    </div>
                                    <div class="flex justify-between items-center text-xs border-b border-gray-100 pb-2">
                                        <span class="text-gray-500">Umumiy Chiqim:</span>
                                        <span class="font-bold text-rose-500 font-mono">[[ formatMoney(financeSummary.chiqim) ]]</span>
                                    </div>
                                    <div class="pt-1 flex justify-between items-center text-xs font-extrabold">
                                        <span class="text-slate-800">[[ financeSummary.profit >= 0 ? 'Sof Foyda:' : 'Zarar (Minusda):' ]]</span>
                                        <span class="font-mono text-sm" :class="financeSummary.profit >= 0 ? 'text-emerald-600' : 'text-rose-500'">[[ formatMoney(financeSummary.profit) ]]</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Davomat Qisqa Ko'rinish -->
                        <div class="card-3d p-6 rounded-3xl flex flex-col justify-between min-h-[180px]">
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase mb-4">// BUGUNGI DAVOMAT</h3>
                                <div class="flex items-center gap-6">
                                    <!-- 3D Dial Ring -->
                                    <div class="w-16 h-16 rounded-full bg-emerald-50 border-2 border-emerald-400 flex items-center justify-center text-emerald-600 font-black text-lg shadow-sm">
                                        [[ todayAttendancePercentage ]]%
                                    </div>
                                    <div class="text-xs space-y-2">
                                        <div class="flex items-center gap-1 text-emerald-600 font-bold">
                                            <span>🟢 Keldilar:</span>
                                            <span class="font-mono">[[ todayPresentCount ]] ta</span>
                                        </div>
                                        <div class="flex items-center gap-1 text-rose-500 font-bold">
                                            <span>🔴 Kelmadilar:</span>
                                            <span class="font-mono">[[ todayAbsentCount ]] ta</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB: HAMKORLAR ==================== -->
                <div v-else-if="activeAdminTab === 'hamkorlar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-bold text-slate-800">// HAMKORLAR (PARTNERS) TIZIMI</h2>
                        <button @click="showAddPartnerForm = true" class="btn-3d px-4 py-2 bg-emerald-600 text-white font-bold text-xs rounded-xl border-b-4 border-b-emerald-800 flex items-center gap-1.5">
                            ➕ YANGI HAMKOR QO'SHISH
                        </button>
                    </div>

                    <!-- Add Partner Form (Modal-like card) -->
                    <div v-if="showAddPartnerForm" class="p-4 bg-gray-50 border rounded-2xl flex flex-col gap-4">
                        <h3 class="text-xs font-bold text-slate-700">Yangi Hamkor Kiritish Ssenariysi</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input v-model="newPartner.name" type="text" placeholder="Hamkor Nomi" class="p-2.5 rounded-xl border text-xs bg-white" />
                            <input v-model="newPartner.phone" type="text" placeholder="Telefon raqami" class="p-2.5 rounded-xl border text-xs bg-white" />
                            <input v-model.number="newPartner.commission" type="number" placeholder="Hamkorlik foizi (%)" class="p-2.5 rounded-xl border text-xs bg-white" />
                        </div>
                        <div class="flex gap-2 justify-end">
                            <button @click="showAddPartnerForm = false" class="px-4 py-2 bg-gray-200 text-gray-700 text-xs font-bold rounded-lg hover:bg-gray-300">Bekor qilish</button>
                            <button @click="addPartner" class="px-4 py-2 bg-[#0066cc] text-white text-xs font-bold rounded-lg hover:bg-blue-700">Saqlash</button>
                        </div>
                    </div>

                    <!-- Partners Table -->
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-3 text-gray-400 font-bold">HAMKOR NOMI</th>
                                    <th class="p-3 text-gray-400 font-bold">TELEFON</th>
                                    <th class="p-3 text-gray-400 font-bold">SHARTNOMA FOIZI</th>
                                    <th class="p-3 text-gray-400 font-bold">KIRITILGAN SANA</th>
                                    <th class="p-3 text-gray-400 font-bold">HOLATI</th>
                                    <th class="p-3 text-gray-400 font-bold text-right">KOMISSIYA HISOBLASH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="p in partnersList" :key="p.id" class="border-b hover:bg-gray-50/50">
                                    <td class="p-3 font-bold text-slate-800">[[ p.name ]]</td>
                                    <td class="p-3 text-gray-600">[[ p.phone ]]</td>
                                    <td class="p-3 font-mono font-bold text-[#0066cc]">[[ p.commission ]]%</td>
                                    <td class="p-3 text-gray-500 font-mono">[[ p.joined_date ]]</td>
                                    <td class="p-3">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold" :class="p.status === 'Active' ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-600'">
                                            [[ p.status ]]
                                        </span>
                                    </td>
                                    <td class="p-3 text-right font-mono font-extrabold text-slate-800">
                                        [[ formatMoney(financeSummary.kirim * (p.commission / 100)) ]]
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ==================== TAB: O'QUVCHILAR ==================== -->
                <div v-else-if="activeAdminTab === 'oquvchilar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6">
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 border-b pb-4">
                        <h2 class="text-lg font-bold text-slate-800">// O'QUVCHILAR STRUKTURASI VA TIZIMI</h2>
                        
                        <!-- Mini Tabs: Davomat, Baholash, Struktura -->
                        <div class="flex gap-1.5 bg-gray-100 p-1 rounded-xl text-xs font-bold">
                            <button @click="activeStudentSubTab = 'struktura'" class="px-3 py-1.5 rounded-lg" :class="activeStudentSubTab === 'struktura' ? 'bg-white shadow-sm' : 'text-gray-500 hover:text-slate-800'">
                                📂 STRUKTURA
                            </button>
                            <button @click="activeStudentSubTab = 'davomat'" class="px-3 py-1.5 rounded-lg" :class="activeStudentSubTab === 'davomat' ? 'bg-white shadow-sm' : 'text-gray-500 hover:text-slate-800'">
                                📅 DAVOMAT
                            </button>
                            <button @click="activeStudentSubTab = 'baholash'" class="px-3 py-1.5 rounded-lg" :class="activeStudentSubTab === 'baholash' ? 'bg-white shadow-sm' : 'text-gray-500 hover:text-slate-800'">
                                📝 BAHOLASH
                            </button>
                        </div>
                    </div>

                    <!-- Subtab 1: Struktura -->
                    <div v-if="activeStudentSubTab === 'struktura'" class="flex flex-col gap-4">
                        <span class="text-xs text-gray-400 font-bold block">// SINFLAR VA GURUHLAR BO'YICHA TAQSIMOT</span>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div v-for="cls in classesList" :key="cls.name" class="p-4 bg-gray-50 border rounded-2xl hover:bg-gray-100/50 transition-all">
                                <h4 class="text-sm font-bold text-[#0066cc] mb-1">Guruh: [[ cls.name ]]</h4>
                                <div class="text-xs text-gray-500 space-y-1">
                                    <div>Mashg'ulot turi: [[ cls.type ]]</div>
                                    <div class="font-bold text-slate-700">Jami o'quvchilar: [[ studentsList.filter(s => s.class_name === cls.name).length ]] ta</div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Students List -->
                        <div class="overflow-x-auto w-full mt-4">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="p-3 text-gray-400 font-bold">O'QUVCHI ISMI</th>
                                        <th class="p-3 text-gray-400 font-bold">GURUH (SINFI)</th>
                                        <th class="p-3 text-gray-400 font-bold">TO'LOV STATUSI</th>
                                        <th class="p-3 text-gray-400 font-bold">TIZIMGA KIRISH (LOGIN/PAROL)</th>
                                        <th class="p-3 text-gray-400 font-bold">O'RTACHA BAHOSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="s in studentsList" :key="s.id" class="border-b hover:bg-gray-50/50">
                                        <td class="p-3 font-bold text-slate-800">[[ s.name ]]</td>
                                        <td class="p-3"><span class="px-2 py-0.5 rounded text-[10px] font-bold bg-[#0066cc]/10 text-[#0066cc]">[[ s.class_name ]]</span></td>
                                        <td class="p-3">
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold" :class="s.tuition_status === 'To\'lagan' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600'">
                                                [[ s.tuition_status ]]
                                            </span>
                                        </td>
                                        <td class="p-3">
                                            <div class="flex items-center gap-1.5">
                                                <input 
                                                    v-model="s.login" 
                                                    type="text" 
                                                    placeholder="Login" 
                                                    class="w-20 p-1 border rounded text-xs bg-white text-slate-700 font-semibold" 
                                                />
                                                <input 
                                                    v-model="s.password" 
                                                    type="text" 
                                                    placeholder="Parol" 
                                                    class="w-24 p-1 border rounded text-xs bg-white text-slate-700 font-mono" 
                                                />
                                            </div>
                                        </td>
                                        <td class="p-3 font-mono font-bold text-slate-800">
                                            [[ calculateAverageGrade(s.grades) ]]
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Subtab 2: Davomat -->
                    <div v-else-if="activeStudentSubTab === 'davomat'" class="flex flex-col gap-4">
                        <span class="text-xs text-gray-400 font-bold block">// BUGUNGI DAVOMATNI BELGILASH (2026-07-08)</span>
                        <div class="overflow-x-auto w-full">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="p-3 text-gray-400 font-bold">O'QUVCHI ISMI</th>
                                        <th class="p-3 text-gray-400 font-bold">GURUH</th>
                                        <th class="p-3 text-gray-400 font-bold text-center">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="s in studentsList" :key="s.id" class="border-b">
                                        <td class="p-3 font-bold text-slate-800">[[ s.name ]]</td>
                                        <td class="p-3 text-gray-500">[[ s.class_name ]]</td>
                                        <td class="p-3 flex justify-center gap-2">
                                            <button 
                                                @click="s.today_status = 'keldi'" 
                                                class="px-3 py-1.5 rounded-lg text-[10px] font-bold transition-all"
                                                :class="s.today_status === 'keldi' ? 'bg-emerald-500 text-white shadow-sm' : 'bg-gray-100 text-gray-500 hover:bg-gray-200'"
                                            >
                                                KELDILAR
                                            </button>
                                            <button 
                                                @click="s.today_status = 'kelmadi'" 
                                                class="px-3 py-1.5 rounded-lg text-[10px] font-bold transition-all"
                                                :class="s.today_status === 'kelmadi' ? 'bg-rose-500 text-white shadow-sm' : 'bg-gray-100 text-gray-500 hover:bg-gray-200'"
                                            >
                                                KELMADILAR
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Subtab 3: Baholash -->
                    <div v-else-if="activeStudentSubTab === 'baholash'" class="flex flex-col gap-4">
                        <span class="text-xs text-gray-400 font-bold block">// IMTIHON BAHOLARI</span>
                        <div class="overflow-x-auto w-full">
                            <table class="w-full text-left text-xs border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 border-b">
                                        <th class="p-3 text-gray-400 font-bold">O'QUVCHI ISMI</th>
                                        <th class="p-3 text-gray-400 font-bold">GURUH</th>
                                        <th class="p-3 text-gray-400 font-bold">IMTIHON BALI (GRADES)</th>
                                        <th class="p-3 text-gray-400 font-bold text-right">BAHOLASH (YANGI BAHOLAR)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="s in studentsList" :key="s.id" class="border-b">
                                        <td class="p-3 font-bold text-slate-800">[[ s.name ]]</td>
                                        <td class="p-3 text-gray-500">[[ s.class_name ]]</td>
                                        <td class="p-3 font-mono text-slate-700 flex flex-wrap gap-1.5 items-center min-h-[48px]">
                                             <span v-if="!s.grades || s.grades.length === 0" class="text-gray-400 italic text-[10px] select-none">Baho qo'yilmagan</span>
                                             <span 
                                                 v-else
                                                 v-for="(g, idx) in s.grades" 
                                                 :key="idx"
                                                 class="px-2 py-1 rounded-lg text-[10px] font-extrabold inline-flex items-center gap-1 border select-none transition-all"
                                                 :class="{
                                                     'bg-emerald-50 text-emerald-600 border-emerald-100': g === 5,
                                                     'bg-blue-50 text-blue-600 border-blue-100': g === 4,
                                                     'bg-amber-50 text-amber-600 border-amber-100': g === 3,
                                                     'bg-rose-50 text-rose-600 border-rose-100': g === 2
                                                 }"
                                             >
                                                 [[ g ]]
                                                 <button 
                                                     @click="deleteStudentGrade(s.id, idx)"
                                                     class="w-3.5 h-3.5 rounded-full flex items-center justify-center bg-gray-200/50 hover:bg-red-500 hover:text-white transition-all text-[8px] font-bold cursor-pointer grade-delete-btn"
                                                     title="O'chirish"
                                                 >
                                                     ×
                                                 </button>
                                             </span>
                                        </td>
                                        <td class="p-3 text-right">
                                            <div class="flex gap-1 justify-end">
                                                <button @click="addStudentGrade(s.id, 5)" class="w-8 h-8 rounded bg-emerald-50 text-emerald-600 border border-emerald-200 hover:bg-emerald-500 hover:text-white font-bold text-xs">5</button>
                                                <button @click="addStudentGrade(s.id, 4)" class="w-8 h-8 rounded bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-500 hover:text-white font-bold text-xs">4</button>
                                                <button @click="addStudentGrade(s.id, 3)" class="w-8 h-8 rounded bg-amber-50 text-amber-600 border border-amber-200 hover:bg-amber-500 hover:text-white font-bold text-xs">3</button>
                                                <button @click="addStudentGrade(s.id, 2)" class="w-8 h-8 rounded bg-rose-50 text-rose-600 border border-rose-200 hover:bg-rose-500 hover:text-white font-bold text-xs">2</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB: XODIMLAR & O'QITUVCHILAR ==================== -->
                <div v-else-if="activeAdminTab === 'xodimlar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6">
                    <div class="flex justify-between items-center border-b pb-4 flex-wrap gap-2">
                        <h2 class="text-lg font-bold text-slate-800">// O'QITUVCHILAR VA TO'LOV TIZIMI</h2>
                        <button 
                            @click="showAddStaffForm = !showAddStaffForm"
                            class="py-2 px-4 bg-[#0066cc] hover:bg-blue-700 active:scale-95 text-white rounded-xl font-bold text-xs flex items-center gap-1.5 transition-all shadow-sm"
                        >
                            [[ showAddStaffForm ? '✕ Shaklni yopish' : '➕ Yangi o\'qituvchi / xodim qo\'shish' ]]
                        </button>
                    </div>

                    <!-- Yangi o'qituvchi / xodim qo'shish formasi -->
                    <div v-if="showAddStaffForm" class="p-5 bg-gradient-to-br from-blue-50/90 to-indigo-50/60 border border-blue-200 rounded-3xl flex flex-col gap-4 text-left shadow-md animate-scaleUp">
                        <div class="flex justify-between items-center border-b border-blue-100 pb-2">
                            <h3 class="text-xs font-black text-[#0066cc] uppercase tracking-wider flex items-center gap-1.5">
                                👨‍🏫 Yangi O'qituvchi Profilini Yaratish
                            </h3>
                            <span class="text-[10px] font-mono text-gray-500">Tizimga kirish uchun login va parol o'rnating</span>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
                            <div class="flex flex-col gap-1">
                                <label class="font-bold text-slate-700 text-[11px]">Xodim / O'qituvchi Ismi Familiyasi *</label>
                                <input 
                                    v-model="newStaff.name" 
                                    type="text" 
                                    placeholder="Masalan: Rustam Valiyev" 
                                    class="p-2.5 rounded-xl border border-slate-200 bg-white font-semibold text-slate-800 focus:ring-2 focus:ring-blue-400"
                                />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-bold text-slate-700 text-[11px]">Lavozimi *</label>
                                <select v-model="newStaff.role" class="p-2.5 rounded-xl border border-slate-200 bg-white font-semibold text-slate-800 focus:ring-2 focus:ring-blue-400">
                                    <option value="Katta o'qituvchi">Katta o'qituvchi</option>
                                    <option value="Nazariya o'qituvchisi">Nazariya o'qituvchisi</option>
                                    <option value="Amaliy yo'riqchi">Amaliy yo'riqchi (Instruktor)</option>
                                    <option value="Bosh hisobchi">Bosh hisobchi</option>
                                    <option value="Administrator">Administrator</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-bold text-slate-700 text-[11px]">To'lov Modeli *</label>
                                <select v-model="newStaff.payment_type" class="p-2.5 rounded-xl border border-slate-200 bg-white font-semibold text-slate-800 focus:ring-2 focus:ring-blue-400">
                                    <option value="percentage">Percentage (Foizli ulush)</option>
                                    <option value="fixed">Fixed (Qat'iy oylik maosh)</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-bold text-slate-700 text-[11px]">
                                    [[ newStaff.payment_type === 'fixed' ? 'Oylik Maosh Miqdori (UZS) *' : 'O\'quvchi to\'lovidan foiz (%) *' ]]
                                </label>
                                <input 
                                    v-if="newStaff.payment_type === 'fixed'"
                                    v-model.number="newStaff.base_salary" 
                                    type="number" 
                                    placeholder="Masalan: 4500000" 
                                    class="p-2.5 rounded-xl border border-slate-200 bg-white font-mono font-bold text-slate-800 focus:ring-2 focus:ring-blue-400"
                                />
                                <input 
                                    v-else
                                    v-model.number="newStaff.percentage_rate" 
                                    type="number" 
                                    placeholder="Masalan: 40" 
                                    class="p-2.5 rounded-xl border border-slate-200 bg-white font-mono font-bold text-slate-800 focus:ring-2 focus:ring-blue-400"
                                />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-bold text-slate-700 text-[11px]">Tizimga Kirish Logini (Login) *</label>
                                <input 
                                    v-model="newStaff.login" 
                                    type="text" 
                                    placeholder="Masalan: rustam" 
                                    class="p-2.5 rounded-xl border border-slate-200 bg-white font-bold text-blue-600 focus:ring-2 focus:ring-blue-400"
                                />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="font-bold text-slate-700 text-[11px]">Tizimga Kirish Paroli (Parol) *</label>
                                <input 
                                    v-model="newStaff.password" 
                                    type="text" 
                                    placeholder="Masalan: Rst82" 
                                    class="p-2.5 rounded-xl border border-slate-200 bg-white font-mono font-bold text-slate-800 focus:ring-2 focus:ring-blue-400"
                                />
                            </div>
                        </div>

                        <div class="flex justify-end gap-2 mt-2">
                            <button 
                                @click="showAddStaffForm = false" 
                                class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs"
                            >
                                Bekor qilish
                            </button>
                            <button 
                                @click="addNewStaff" 
                                class="px-6 py-2.5 bg-[#10b981] hover:bg-emerald-600 active:scale-95 text-white rounded-xl font-black text-xs uppercase tracking-wide border-b-2 border-b-emerald-800 shadow-md flex items-center gap-1.5"
                            >
                                💾 Saqlash va Profilni ochish
                            </button>
                        </div>
                    </div>

                    <!-- Salary Computation Explanation card -->
                    <div class="p-4 bg-[#0066cc]/5 border border-[#0066cc]/10 rounded-2xl text-xs text-[#0066cc]">
                        <strong>💡 Oylik to'lash modeli:</strong> O'qituvchiga ikki xil modelda haq to'lanadi: 
                        1) <strong>Fixed (Oylik)</strong> - qat'iy belgilangan oylik maosh; 
                        2) <strong>Percentage (Foiz)</strong> - u o'qitadigan guruhdagi o'quvchilar sonidan shartnoma foiziga ko'ra hisoblanadigan komissiya haqi.
                    </div>

                    <!-- Staff Table -->
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-3 text-gray-400 font-bold">XODIM ISMI</th>
                                    <th class="p-3 text-gray-400 font-bold">LAVOZIMI</th>
                                    <th class="p-3 text-gray-400 font-bold">TO'LOV MODELI</th>
                                    <th class="p-3 text-gray-400 font-bold">MIQDORI / FOIZI</th>
                                    <th class="p-3 text-gray-400 font-bold">O'QUVCHILARI</th>
                                    <th class="p-3 text-gray-400 font-bold">TIZIMGA KIRISH (LOGIN/PAROL)</th>
                                    <th class="p-3 text-gray-400 font-bold text-right">HISOB-KITOB TO'LOVI</th>
                                    <th class="p-3 text-gray-400 font-bold text-center">AMALLAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="t in staffList" :key="t.id" class="border-b hover:bg-gray-50/50">
                                    <td class="p-3">
                                        <input 
                                            v-model="t.name" 
                                            type="text" 
                                            placeholder="Xodim ismi"
                                            class="w-full min-w-[140px] p-1.5 border border-slate-200 rounded-lg text-xs bg-white text-slate-800 font-bold focus:ring-2 focus:ring-blue-400 focus:border-blue-500 shadow-sm"
                                        />
                                    </td>
                                    <td class="p-3">
                                        <input 
                                            v-model="t.role" 
                                            type="text" 
                                            placeholder="Lavozimi"
                                            class="w-full min-w-[130px] p-1.5 border border-slate-200 rounded-lg text-xs bg-white text-slate-700 font-semibold focus:ring-2 focus:ring-blue-400 focus:border-blue-500 shadow-sm"
                                        />
                                    </td>
                                    <td class="p-3">
                                        <select v-model="t.payment_type" class="p-1 rounded border text-xs bg-white text-slate-700">
                                            <option value="fixed">Fixed (Oylik)</option>
                                            <option value="percentage">Percentage (Foizli)</option>
                                        </select>
                                    </td>
                                    <td class="p-3">
                                        <input 
                                            v-if="t.payment_type === 'fixed'" 
                                            v-model.number="t.base_salary" 
                                            type="number" 
                                            class="w-24 p-1 border rounded font-mono text-xs" 
                                        />
                                        <input 
                                            v-else 
                                            v-model.number="t.percentage_rate" 
                                            type="number" 
                                            class="w-12 p-1 border rounded font-mono text-xs" 
                                        />
                                        <span class="text-[10px] text-gray-400 ml-1">[[ t.payment_type === 'fixed' ? 'UZS' : '%' ]]</span>
                                    </td>
                                    <td class="p-3 font-bold">[[ t.students_count || 0 ]] ta</td>
                                    <td class="p-3">
                                        <div class="flex items-center gap-1.5">
                                            <input 
                                                v-model="t.login" 
                                                type="text" 
                                                placeholder="Login" 
                                                class="w-20 p-1 border rounded text-xs bg-white text-slate-700 font-semibold focus:ring-1 focus:ring-blue-400" 
                                            />
                                            <input 
                                                v-model="t.password" 
                                                type="text" 
                                                placeholder="Parol" 
                                                class="w-16 p-1 border rounded text-xs bg-white text-slate-700 font-mono focus:ring-1 focus:ring-blue-400" 
                                            />
                                        </div>
                                    </td>
                                    <td class="p-3 text-right font-mono font-extrabold text-slate-800">
                                        [[ formatMoney(calculateTeacherSalary(t)) ]]
                                    </td>
                                    <td class="p-3 text-center">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <button 
                                                @click="saveStaffMember(t)" 
                                                class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-500 hover:text-white text-emerald-700 border border-emerald-200 rounded-lg text-xs font-bold transition-all flex items-center gap-1 shadow-sm"
                                                title="Login, parol va ma'lumotlarni saqlash"
                                            >
                                                💾 Saqlash
                                            </button>
                                            <button 
                                                @click="deleteStaffMember(t.id)" 
                                                class="px-2 py-1 bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-700 border border-rose-200 rounded-lg text-xs font-bold transition-all shadow-sm"
                                                title="O'chirish"
                                            >
                                                🗑️
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ==================== TAB: MOLIYA ==================== -->
                <div v-else-if="activeAdminTab === 'moliya'" class="card-3d p-6 rounded-3xl flex flex-col gap-6">
                    <div class="flex justify-between items-center border-b pb-4">
                        <h2 class="text-lg font-bold text-slate-800">// MOLIYA VA KASSA TIZIMI</h2>
                    </div>

                    <!-- Moliya Cards -->
                    <div class="grid grid-cols-3 gap-4">
                        <div 
                            @click="openPaymentChat"
                            class="p-4 bg-emerald-50 rounded-2xl border border-emerald-100 text-center cursor-pointer hover:scale-[1.03] active:scale-[0.98] transition-all duration-200 hover:shadow-sm"
                        >
                            <span class="text-[10px] font-bold text-emerald-600 block uppercase">// JAMI KIRIM (BOSING)</span>
                            <span class="text-xl font-bold text-emerald-600 font-mono">[[ formatMoney(financeSummary.kirim) ]]</span>
                        </div>
                        <div 
                            @click="openExpenseChat"
                            class="p-4 bg-red-50 rounded-2xl border border-red-100 text-center cursor-pointer hover:scale-[1.03] active:scale-[0.98] transition-all duration-200 hover:shadow-sm"
                        >
                            <span class="text-[10px] font-bold text-red-600 block uppercase">// JAMI CHIQIM (BOSING)</span>
                            <span class="text-xl font-bold text-red-600 font-mono">[[ formatMoney(financeSummary.chiqim) ]]</span>
                        </div>
                        <div 
                            @click="openProfitChat"
                            class="p-4 rounded-2xl text-center cursor-pointer hover:scale-[1.03] active:scale-[0.98] transition-all duration-200 hover:shadow-sm"
                            :class="financeSummary.profit >= 0 
                                ? 'bg-blue-50 border border-blue-100 text-blue-600' 
                                : 'bg-red-50 border border-red-100 text-red-600'"
                        >
                            <span class="text-[10px] font-bold block uppercase" :class="financeSummary.profit >= 0 ? 'text-blue-600' : 'text-red-500'">
                                [[ financeSummary.profit >= 0 ? '// NET PROFIT (BOSING)' : '// ZARAR / DEFICIT (BOSING)' ]]
                            </span>
                            <span class="text-xl font-bold font-mono">[[ formatMoney(financeSummary.profit) ]]</span>
                        </div>
                    </div>

                    <!-- Transactions list -->
                    <div class="flex flex-col gap-3">
                        <span class="text-xs text-gray-400 font-bold uppercase block">// OXIRGI MOLIYAVIY TRANZAKSIYALAR</span>
                        <div class="space-y-2">
                            <div 
                                v-for="t in financeTransactionsList" 
                                :key="t.id" 
                                class="p-3 bg-gray-50 border rounded-xl flex items-center justify-between text-xs"
                            >
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800">[[ t.category ]]</span>
                                    <span class="text-[10px] text-gray-400">[[ t.date ]]</span>
                                </div>
                                <span class="font-mono font-bold" :class="t.type === 'kirim' ? 'text-emerald-600' : 'text-red-500'">
                                    [[ t.type === 'kirim' ? '+' : '-' ]] [[ formatMoney(t.amount) ]]
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==================== TAB: OBUNALAR & STATUS ==================== -->
                <div v-else-if="activeAdminTab === 'obunalar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6">
                    <h2 class="text-lg font-bold text-slate-800">// OBUNACHILAR VA HOLATLARNI BOSHQARISH</h2>
                    
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 bg-gray-50 border border-gray-100 rounded-2xl text-center">
                            <span class="text-[10px] font-bold text-gray-500 block uppercase">Jami obunachilar (O'quvchilar)</span>
                            <span class="text-2xl font-black text-slate-800 font-mono">[[ studentsList.length ]] ta</span>
                        </div>
                        <div class="p-4 bg-emerald-50 border border-emerald-100 rounded-2xl text-center">
                            <span class="text-[10px] font-bold text-emerald-600 block uppercase">Faollar (To'laganlar)</span>
                            <span class="text-2xl font-black text-emerald-600 font-mono">[[ studentsList.filter(s => getStudentSubscriptionStatus(s) === 'Faol').length ]] ta</span>
                        </div>
                        <div class="p-4 bg-red-50 border border-red-100 rounded-2xl text-center">
                            <span class="text-[10px] font-bold text-red-600 block uppercase">Muddati tugaganlar (Bloklanganlar)</span>
                            <span class="text-2xl font-black text-red-600 font-mono">[[ studentsList.filter(s => getStudentSubscriptionStatus(s) === 'Muddati tugagan').length ]] ta</span>
                        </div>
                    </div>

                    <!-- Subscribers List Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200 text-gray-400 font-mono uppercase">
                                    <th class="p-3 font-bold">O'quvchi</th>
                                    <th class="p-3 font-bold">Guruh</th>
                                    <th class="p-3 font-bold">To'lov muddati</th>
                                    <th class="p-3 font-bold">Status</th>
                                    <th class="p-3 font-bold text-right">Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="s in studentsList" :key="s.id" class="border-b hover:bg-gray-50/50">
                                    <td class="p-3 font-bold text-slate-700">[[ s.name ]]</td>
                                    <td class="p-3 text-gray-500">[[ s.class_name ]]</td>
                                    <td class="p-3 font-mono text-gray-500">[[ s.subscription_end_date ]]</td>
                                    <td class="p-3">
                                        <span 
                                            class="px-2 py-1 rounded-full text-[10px] font-bold"
                                            :class="getStudentSubscriptionStatus(s) === 'Faol' ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'"
                                        >
                                            [[ getStudentSubscriptionStatus(s) === 'Faol' ? 'FAOL (ACTIVE)' : 'BLOKLANGAN (BLOCKED)' ]]
                                        </span>
                                    </td>
                                    <td class="p-3 text-right">
                                        <button 
                                            @click="renewStudentSubscription(s.id)"
                                            class="px-3 py-1.5 bg-[#0066cc] text-white rounded-lg font-bold text-[10px] transition-all hover:bg-blue-600"
                                        >
                                            🔄 To'lovni yangilash (+30 kun)
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ==================== TAB: TEST HISOBOTLARI ==================== -->
                <div v-else-if="activeAdminTab === 'hisobotlar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 text-left animate-fadeIn">
                    <div class="border-b pb-4 flex flex-col text-left">
                        <h2 class="text-base font-black text-slate-800 tracking-tight uppercase">O'quvchilar Test Hisoboti</h2>
                        <span class="text-[9px] font-mono text-gray-400 uppercase">// Imtihondan o'tish ko'rsatkichlari va savollar yechish tahlili</span>
                    </div>

                    <!-- Top Summary Stats Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 bg-emerald-50/50 border border-emerald-100/50 rounded-2xl text-center">
                            <span class="text-[10px] font-bold text-emerald-600 block uppercase">Jami topshirilgan imtihonlar</span>
                            <span class="text-2xl font-black text-emerald-600 font-mono">[[ studentTestAttemptsList.length ]] ta</span>
                        </div>
                        <div class="p-4 bg-blue-50/50 border border-blue-100/50 rounded-2xl text-center">
                            <span class="text-[10px] font-bold text-blue-600 block uppercase">O'rtacha to'g'ri javoblar</span>
                            <span class="text-2xl font-black text-blue-600 font-mono">
                                [[ (studentTestAttemptsList.reduce((sum, item) => sum + item.score, 0) / (studentTestAttemptsList.length || 1)).toFixed(1) ]] ta
                            </span>
                        </div>
                        <div class="p-4 bg-purple-50/50 border border-purple-100/50 rounded-2xl text-center">
                            <span class="text-[10px] font-bold text-purple-600 block uppercase">Muvaffaqiyatli o'tganlar</span>
                            <span class="text-2xl font-black text-purple-600 font-mono">
                                [[ studentTestAttemptsList.filter(item => item.score >= 20).length ]] ta
                            </span>
                        </div>
                    </div>

                    <!-- Main Split Layout -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left Panel: Students list summary -->
                        <div class="lg:col-span-1.5 p-5 bg-white border border-gray-100 rounded-2xl shadow-sm flex flex-col gap-4">
                            <span class="font-black text-slate-800 text-[11px] uppercase tracking-wider block border-b pb-2">// O'QUVCHILAR KO'RSATKICHLARI</span>
                            
                            <div class="overflow-x-auto text-[11px]">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="text-gray-400 font-mono border-b pb-2">
                                            <th class="pb-2 font-bold">O'quvchi</th>
                                            <th class="pb-2 font-bold text-center">Topshirdi</th>
                                            <th class="pb-2 font-bold text-center">O'rtacha ball</th>
                                            <th class="pb-2 font-bold text-right">Harakat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="s in studentsList" :key="s.id" class="border-b hover:bg-slate-50/50">
                                            <td class="py-3 font-bold text-slate-700">[[ s.name ]]<span class="block text-[9px] font-normal text-gray-400">Guruh: [[ s.class_name ]]</span></td>
                                            <td class="py-3 text-center font-mono font-bold text-slate-800">
                                                [[ studentTestAttemptsList.filter(item => item.student_id === s.id).length ]] ta
                                            </td>
                                            <td class="py-3 text-center">
                                                <span class="px-2 py-0.5 rounded font-mono font-bold text-xs" :class="getAverageScoreClassForStudent(s.id)">
                                                    [[ getAverageScoreForStudent(s.id) ]] / 20
                                                </span>
                                            </td>
                                            <td class="py-3 text-right">
                                                <button 
                                                    @click="selectedReportStudentId = s.id"
                                                    class="px-2.5 py-1 bg-[#0066cc] text-white rounded font-bold text-[9px]"
                                                >
                                                    Batafsil
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Right Panel: Attempt history details -->
                        <div class="lg:col-span-1.5 p-5 bg-white border border-gray-100 rounded-2xl shadow-sm flex flex-col gap-4">
                            <div class="flex items-center justify-between border-b pb-2">
                                <span class="font-black text-slate-800 text-[11px] uppercase tracking-wider">
                                    // [[ selectedReportStudentId ? studentsList.find(s => s.id === selectedReportStudentId).name + ' - IMTIHON VARAQLARI' : 'BARCHA IMTIHONLAR JURNALI' ]]
                                </span>
                                <button 
                                    v-if="selectedReportStudentId"
                                    @click="selectedReportStudentId = null"
                                    class="text-[9px] font-bold text-rose-600 hover:underline"
                                >
                                    Barchasini ko'rish
                                </button>
                            </div>

                            <div class="max-h-[350px] overflow-y-auto space-y-2.5 text-[11px]">
                                <div v-if="filteredAttempts.length === 0" class="text-center py-6 text-gray-400 font-medium">
                                    Hech qanday imtihon topshirilmagan.
                                </div>
                                <div 
                                    v-else 
                                    v-for="item in filteredAttempts" 
                                    :key="item.id"
                                    class="p-3 bg-slate-50 border rounded-xl flex items-center justify-between transition-all"
                                    :class="item.score >= 20 ? 'border-emerald-200 bg-emerald-50/10' : 'border-red-100 bg-red-50/10'"
                                >
                                    <div class="flex flex-col gap-0.5">
                                        <span class="font-bold text-slate-800">[[ item.student_name ]]</span>
                                        <span class="text-[9px] text-gray-400 font-mono">Topshirilgan vaqt: [[ item.date ]]</span>
                                    </div>
                                    <div class="flex flex-col items-end gap-1">
                                        <span class="px-2 py-0.5 rounded-full text-[9px] font-bold" :class="item.score >= 20 ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700'">
                                            [[ item.score >= 20 ? 'Muvaffaqiyatli' : 'Muvaffaqiyatsiz' ]]
                                        </span>
                                        <span class="font-mono font-bold text-slate-800 text-xs">[[ item.score ]] / [[ item.total_questions ]] to'g'ri (Bosqich: [[ item.level ]])</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- ==================== TAB: MENEJER PANELI ==================== -->
                    <div v-if="activeAdminTab === 'menejer'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 text-left animate-fadeIn animate-duration-200">
                        <div class="border-b pb-4 flex flex-col text-left">
                            <h2 class="text-base font-black text-slate-800 tracking-tight uppercase">Menejer Boshqaruv Paneli</h2>
                            <span class="text-[9px] font-mono text-gray-400 uppercase">// O'quvchilarni ro'yxatga olish, guruhlar va ma'muriy amallar</span>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <!-- Left: Register new student form -->
                            <div class="lg:col-span-1 p-5 bg-slate-50 border rounded-2xl flex flex-col gap-4 text-xs font-semibold">
                                <span class="font-black text-slate-700 block uppercase tracking-wide">// YANGI O'QUVCHINI RO'YXATGA OLISH</span>
                                
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-gray-500 font-bold">O'quvchi to'liq ismi (F.I.SH)</label>
                                    <input type="text" v-model="newStudent.name" placeholder="Masalan: Dilshod Abduvaliyev" class="p-2.5 rounded-xl border bg-white" />
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-gray-500 font-bold">Guruhni tanlang</label>
                                    <select v-model="newStudent.class_name" class="p-2.5 rounded-xl border bg-white text-xs">
                                        <option v-for="c in classesList" :key="c.name" :value="c.name">[[ c.name ]] - [[ c.type ]]</option>
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-gray-500 font-bold">Tizim Logini (Username)</label>
                                    <input type="text" v-model="newStudent.login" placeholder="Masalan: dilshod" class="p-2.5 rounded-xl border bg-white" />
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-gray-500 font-bold">Kirish paroli</label>
                                    <input type="text" v-model="newStudent.password" placeholder="Masalan: 12345" class="p-2.5 rounded-xl border bg-white" />
                                </div>
                                <div class="flex flex-col gap-1.5">
                                    <label class="text-gray-500 font-bold">To'lov muddati tugash sanasi</label>
                                    <input type="date" v-model="newStudent.subscription_end_date" class="p-2.5 rounded-xl border bg-white" />
                                </div>
                                
                                <button 
                                    @click="registerNewStudentByManager"
                                    class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold uppercase transition-all shadow-md mt-2 text-center"
                                >
                                    O'quvchini ro'yxatdan o'tkazish
                                </button>
                            </div>

                            <!-- Right: Groups & Logs list -->
                            <div class="lg:col-span-2 flex flex-col gap-6">
                                <!-- Groups management card -->
                                <div class="p-5 bg-white border border-gray-100 rounded-2xl shadow-sm flex flex-col gap-4">
                                    <div class="flex items-center justify-between border-b pb-3">
                                        <span class="font-black text-slate-800 text-[11px] uppercase tracking-wider">// MAVJUD GURUHLAR RO'YXATI</span>
                                        <button 
                                            @click="showAddClassForm = !showAddClassForm"
                                            class="text-[10px] font-bold text-[#0066cc] hover:underline"
                                        >
                                            [[ showAddClassForm ? 'Bekor qilish' : '+ Yangi guruh qo\'shish' ]]
                                        </button>
                                    </div>

                                    <!-- Add new group form -->
                                    <div v-if="showAddClassForm" class="p-3 bg-slate-50 border rounded-xl flex flex-col gap-3 text-xs animate-fadeIn">
                                        <div class="grid grid-cols-2 gap-3">
                                            <div class="flex flex-col gap-1">
                                                <label class="font-bold text-gray-500">Guruh kodi (Nomi)</label>
                                                <input type="text" v-model="newClass.name" placeholder="Masalan: D-08" class="p-2 border rounded-lg bg-white text-xs" />
                                            </div>
                                            <div class="flex flex-col gap-1">
                                                <label class="font-bold text-gray-500">Kategoriya (Turi)</label>
                                                <input type="text" v-model="newClass.type" placeholder="Masalan: Yuk mashinalari (C)" class="p-2 border rounded-lg bg-white text-xs" />
                                            </div>
                                        </div>
                                        <button 
                                            @click="addNewClassByManager"
                                            class="px-4 py-2 bg-[#0066cc] text-white rounded-lg font-bold self-start"
                                        >
                                            Guruhni yaratish
                                        </button>
                                    </div>

                                    <!-- Groups table -->
                                    <div class="overflow-x-auto text-[11px]">
                                        <table class="w-full text-left border-collapse">
                                            <thead>
                                                <tr class="text-gray-400 font-mono border-b pb-2">
                                                    <th class="pb-2 font-bold">Guruh kodi</th>
                                                    <th class="pb-2 font-bold">Kategoriya</th>
                                                    <th class="pb-2 font-bold">O'quvchilar soni</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="c in classesList" :key="c.name" class="border-b hover:bg-slate-50/50">
                                                    <td class="py-2.5 font-bold text-slate-700">[[ c.name ]]</td>
                                                    <td class="py-2.5 text-gray-500">[[ c.type ]]</td>
                                                    <td class="py-2.5 font-mono text-gray-600 font-bold">
                                                        [[ studentsList.filter(s => s.class_name === c.name).length ]] ta o'quvchi
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Manager Action Logs list -->
                                <div class="p-5 bg-white border border-gray-100 rounded-2xl shadow-sm flex flex-col gap-3 text-xs">
                                    <span class="font-black text-slate-800 text-[11px] uppercase tracking-wider block border-b pb-2">// MENEJER AMALLARI LOGI</span>
                                    <div class="max-h-[150px] overflow-y-auto space-y-2 font-mono text-[10px] text-gray-500">
                                        <div v-for="(log, idx) in managerLogs" :key="idx" class="p-2 bg-slate-50 border border-slate-100 rounded-lg">
                                            ⌛ [[ log.time ]] // <span class="text-slate-700 font-semibold">[[ log.action ]]</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- ==================== TAB: TEST QO'SHISH & BAZA ==================== -->
                <div v-else-if="activeAdminTab === 'savollar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 text-left animate-fadeIn">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b pb-4">
                        <div>
                            <h2 class="text-lg font-black text-slate-800 uppercase tracking-tight flex items-center gap-2">
                                📝 TEST QO'SHISH VA SAVOLLAR BAZASI
                            </h2>
                            <p class="text-xs text-gray-500 font-mono">YHQ imtihon testlarini kiritish, tahrirlash, qidirish va bazani boshqarish</p>
                        </div>
                        <button 
                            @click="showAddQuestionForm = !showAddQuestionForm; if (!editingQuestionId) cancelEditQuestion();"
                            class="btn-3d px-5 py-2.5 bg-[#0066cc] hover:bg-blue-700 text-white font-extrabold text-xs rounded-xl transition-all shadow-md shadow-blue-500/20 border-b-[3px] border-b-blue-800 flex items-center gap-2 self-start sm:self-auto"
                        >
                            [[ showAddQuestionForm ? '✕ Formani yashirish' : '➕ Yangi savol yozish' ]]
                        </button>
                    </div>

                    <!-- Direct Embedded Question Creator / Editor Form -->
                    <div v-if="showAddQuestionForm" class="p-6 bg-slate-50 border border-slate-300 rounded-3xl flex flex-col gap-5 text-left shadow-lg animate-scaleUp">
                        <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                            <h3 class="text-sm font-black text-emerald-600 uppercase tracking-wider flex items-center gap-2">
                                [[ editingQuestionId ? '✏️ #' + editingQuestionId + '-SAVOLNI TAHRIRLASH' : '➕ YANGI TEST SAVOLI KIRITISH' ]]
                            </h3>
                            <span class="text-xs font-mono text-emerald-500 font-bold bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20">
                                [[ editingQuestionId ? 'Tahrirlash rejimi' : 'Avtomatik barcha tillar uchun saqlanadi' ]]
                            </span>
                        </div>

                        <div class="flex flex-col gap-4 text-xs">
                            <div class="flex flex-col gap-1.5">
                                <label class="font-extrabold text-slate-800 text-xs tracking-wide">SAVOL MATNI (YHQ QOIDASI BO'YICHA) *</label>
                                <textarea 
                                    v-model="customQuestionText" 
                                    rows="2"
                                    placeholder="Masalan: Haydovchi qaysi hollarda o'z o'rnini tark etishi yoki transport vositasini qoldirishi mumkin?"
                                    class="w-full p-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs focus:ring-2 focus:ring-emerald-400 outline-none shadow-sm"
                                ></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-1.5">
                                    <label class="font-extrabold text-emerald-600 text-xs tracking-wide flex items-center gap-1">
                                        <span>VARIANT A (TO'G'RI JAVOB ✅) *</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        v-model="customOptA" 
                                        placeholder="To'g'ri javob matni..." 
                                        class="p-3 rounded-xl border-2 border-emerald-500 bg-white font-bold text-emerald-700 text-xs focus:ring-2 focus:ring-emerald-400 outline-none shadow-sm"
                                    />
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="font-extrabold text-rose-500 text-xs tracking-wide flex items-center gap-1">
                                        <span>VARIANT B (NOTO'G'RI JAVOB ❌) *</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        v-model="customOptB" 
                                        placeholder="Noto'g'ri variant 1..." 
                                        class="p-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs focus:ring-2 focus:ring-rose-400 outline-none shadow-sm"
                                    />
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="font-extrabold text-rose-500 text-xs tracking-wide flex items-center gap-1">
                                        <span>VARIANT C (NOTO'G'RI JAVOB ❌) *</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        v-model="customOptC" 
                                        placeholder="Noto'g'ri variant 2..." 
                                        class="p-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs focus:ring-2 focus:ring-rose-400 outline-none shadow-sm"
                                    />
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="font-extrabold text-slate-700 text-xs tracking-wide flex items-center gap-1">
                                        <span>VARIANT D (NOTO'G'RI JAVOB ❌ - IXTIYORIY)</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        v-model="customOptD" 
                                        placeholder="Noto'g'ri variant 3 (bo'sh qoldirish mumkin)..." 
                                        class="p-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs focus:ring-2 focus:ring-blue-400 outline-none shadow-sm"
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-2 flex flex-col gap-1.5">
                                    <label class="font-extrabold text-amber-500 text-xs tracking-wide">QOIDA IZOHI / TUSHUNTIRISH (IXTIYORIY)</label>
                                    <input 
                                        type="text" 
                                        v-model="customExplanation" 
                                        placeholder="Masalan: YHQ 12.4 bandiga binoan to'xtash taqiqlanadi..." 
                                        class="p-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs focus:ring-2 focus:ring-amber-400 outline-none shadow-sm"
                                    />
                                </div>

                                <div class="flex flex-col gap-1.5">
                                    <label class="font-extrabold text-blue-500 text-xs tracking-wide">QIYINCHILIK DARAJASI (BOSQICH)</label>
                                    <select v-model="customLevel" class="p-3 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs focus:ring-2 focus:ring-blue-400 outline-none shadow-sm">
                                        <option :value="1">1-Bosqich (Boshlang'ich)</option>
                                        <option :value="2">2-Bosqich (O'rta)</option>
                                        <option :value="3">3-Bosqich (Murakkab)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex justify-end gap-3 mt-2">
                                <button 
                                    v-if="editingQuestionId" 
                                    @click="cancelEditQuestion" 
                                    class="px-5 py-3 bg-slate-200 hover:bg-slate-300 text-slate-800 rounded-xl font-extrabold text-xs transition-all shadow-sm"
                                >
                                    Bekor qilish
                                </button>
                                <button 
                                    @click="handleSaveCustomQuestion" 
                                    :disabled="isSubmittingCustomQuestion"
                                    class="px-7 py-3 bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white rounded-xl font-black text-xs uppercase tracking-wider border-b-4 border-b-emerald-800 shadow-lg flex items-center gap-2 disabled:opacity-50 transition-all"
                                >
                                    <span v-if="!isSubmittingCustomQuestion">💾 [[ editingQuestionId ? 'O\'ZGARISHLARNI SAQLASH' : 'BAZAGA SAQLASH VA QO\'SHISH' ]]</span>
                                    <span v-else>SAQLANMOQDA...</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Question Search & Statistics Bar -->
                    <div class="p-4 bg-slate-100 border border-slate-300 rounded-2xl flex flex-col md:flex-row items-center justify-between gap-4 text-xs font-bold shadow-sm">
                        <div class="flex items-center gap-2.5 w-full md:w-auto flex-wrap">
                            <span class="text-slate-900 uppercase tracking-wide">📊 Jami savollar:</span>
                            <span class="px-3 py-1 bg-blue-600 text-white rounded-lg font-mono font-black text-xs shadow-sm">[[ adminQuestionsCount ]] ta</span>
                            <span class="text-slate-400">|</span>
                            <span class="text-slate-800">Topildi:</span>
                            <span class="px-2.5 py-1 bg-emerald-600 text-white rounded-lg font-mono font-black text-xs shadow-sm">[[ filteredAdminQuestions.length ]] ta</span>
                        </div>

                        <div class="flex items-center gap-3 w-full md:w-auto flex-wrap">
                            <div class="relative flex-grow md:w-72">
                                <input 
                                    type="text" 
                                    v-model="searchQuestionQuery" 
                                    @input="questionCurrentPage = 1"
                                    placeholder="🔍 Savol matni bo'yicha qidiruv..." 
                                    class="w-full pl-3.5 pr-8 py-2.5 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 focus:ring-2 focus:ring-blue-400 outline-none text-xs shadow-sm"
                                />
                                <button v-if="searchQuestionQuery" @click="searchQuestionQuery = ''; questionCurrentPage = 1;" class="absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-700 font-black">✕</button>
                            </div>

                            <select v-model="filterQuestionLevel" @change="questionCurrentPage = 1" class="p-2.5 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs shadow-sm">
                                <option value="all">Barcha bosqichlar</option>
                                <option value="1">1-bosqich</option>
                                <option value="2">2-bosqich</option>
                                <option value="3">3-bosqich</option>
                            </select>

                            <select v-model="questionSortOrder" @change="questionCurrentPage = 1" class="p-2.5 rounded-xl border border-slate-300 bg-white font-bold text-slate-900 text-xs shadow-sm">
                                <option value="desc">⚡ Yangi kiritilganlar (Tepada)</option>
                                <option value="asc">🔢 Tartib bilan (#1 dan boshlab)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Fast Paginated Table -->
                    <div class="overflow-x-auto w-full border border-slate-300 rounded-2xl shadow-sm">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-slate-200 border-b border-slate-300 text-slate-800 font-black uppercase tracking-wider">
                                    <th class="p-3.5 w-16">ID</th>
                                    <th class="p-3.5">SAVOL MATNI</th>
                                    <th class="p-3.5">TO'G'RI JAVOB (VARIANT A)</th>
                                    <th class="p-3.5 w-28">BOSQICH</th>
                                    <th class="p-3.5 text-center w-40">AMALLAR</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 text-slate-800">
                                <tr v-if="paginatedAdminQuestions.length === 0">
                                    <td colspan="5" class="p-10 text-center text-slate-500 font-extrabold text-sm">
                                        Hech qanday savol topilmadi.
                                    </td>
                                </tr>
                                <tr v-else v-for="q in paginatedAdminQuestions" :key="q.id" class="hover:bg-slate-100/80 transition-all font-medium">
                                    <td class="p-3.5 font-mono font-black text-slate-400">#[[ q.id ]]</td>
                                    <td class="p-3.5 font-bold text-slate-900 max-w-sm">
                                        [[ q.translations && q.translations.uz_lat ? q.translations.uz_lat.question : q.translations?.uz_cyr?.question || 'Savol matni' ]]
                                    </td>
                                    <td class="p-3.5 text-emerald-600 font-black max-w-xs">
                                        [[ getCorrectOptionText(q) || 'To\'g\'ri javob variant A' ]]
                                    </td>
                                    <td class="p-3.5">
                                        <span class="px-3 py-1 rounded-full text-[11px] font-black bg-blue-500/15 text-blue-600 border border-blue-500/30">
                                            [[ q.level ]]-bosqich
                                        </span>
                                    </td>
                                    <td class="p-3.5 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <button 
                                                @click="startEditQuestion(q)" 
                                                class="px-3 py-1.5 bg-blue-500/15 hover:bg-blue-600 hover:text-white text-blue-600 border border-blue-400/40 rounded-xl text-xs font-black transition-all flex items-center gap-1 shadow-sm"
                                                title="Tahrirlash"
                                            >
                                                ✏️ Tahrirlash
                                            </button>
                                            <button 
                                                @click="deleteQuestionFromDb(q.id)" 
                                                class="px-2.5 py-1.5 bg-rose-500/15 hover:bg-rose-600 hover:text-white text-rose-600 border border-rose-400/40 rounded-xl text-xs font-black transition-all shadow-sm"
                                                title="O'chirish"
                                            >
                                                🗑️
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="flex items-center justify-between border-t border-slate-300 pt-4 text-xs font-extrabold text-slate-800">
                        <button 
                            @click="prevQuestionPage" 
                            :disabled="questionCurrentPage <= 1"
                            class="px-4 py-2.5 bg-slate-200 hover:bg-slate-300 disabled:opacity-30 disabled:cursor-not-allowed rounded-xl transition-all flex items-center gap-1.5 shadow-sm"
                        >
                            ← Oldingi sahifa
                        </button>

                        <div class="font-mono text-slate-700 font-bold">
                            Sahifa <strong class="text-blue-600 font-black text-sm">[[ questionCurrentPage ]]</strong> / <strong class="text-sm">[[ totalQuestionPages ]]</strong>
                        </div>

                        <button 
                            @click="nextQuestionPage" 
                            :disabled="questionCurrentPage >= totalQuestionPages"
                            class="px-4 py-2.5 bg-slate-200 hover:bg-slate-300 disabled:opacity-30 disabled:cursor-not-allowed rounded-xl transition-all flex items-center gap-1.5 shadow-sm"
                        >
                            Keyingi sahifa →
                        </button>
                    </div>
                </div>

                <!-- ==================== TAB: SOZLAMALAR ==================== -->
                <div v-else-if="activeAdminTab === 'sozlamalar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 text-left">
                    <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">// TIZIM SOZLAMALARI</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-gray-500">Maktab Nomi (Tizimda)</label>
                            <input type="text" value="DELTA_AVTOMAKTAB_UZ Haydovchilik Maktabi" class="p-2.5 rounded-xl border text-xs bg-slate-50 text-slate-500 font-medium" disabled />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-gray-500">Test o'tish balli</label>
                            <input type="number" value="20" class="p-2.5 rounded-xl border text-xs bg-slate-50 text-slate-500 font-medium" disabled />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-gray-500">O'quvchi Tizimi Sarlavhasi (Ismi)</label>
                            <input type="text" v-model="studentPanelNameSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                        </div>
                    </div>

                    <div class="border-t pt-6 flex flex-col gap-4">
                        <h3 class="text-sm font-black text-slate-800 uppercase tracking-wider">// PANEL PAROLLARINI O'ZGARTIRISH</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">Admin Login (Foydalanuvchi nomi)</label>
                                <input type="text" v-model="adminUsernameSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">Admin Maxfiy Parol</label>
                                <input type="text" v-model="adminPasswordSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">O'quvchi Tizimi Logini</label>
                                <input type="text" v-model="studentPanelUsernameSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">O'quvchi Tizimi Paroli</label>
                                <input type="text" v-model="studentPanelPasswordSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                        </div>
                        <p class="text-[10px] text-amber-600 font-bold uppercase tracking-wide bg-amber-50 p-3 rounded-xl border border-amber-200/50 mt-1">
                            ⚠️ Diqqat: Yangi login va parollar "Sozlamalarni saqlash" tugmasini bosganingizdan so'ng amal qiladi.
                        </p>
                        <button 
                            @click="saveSystemSettings"
                            class="btn-3d self-start px-6 py-3 bg-[#0066cc] text-white rounded-xl text-xs font-bold uppercase tracking-wider border-b-4 border-b-blue-800 hover:bg-blue-600 transition-all flex items-center gap-2 cursor-pointer mt-2"
                        >
                            💾 Sozlamalarni saqlash
                        </button>
                    </div>
                </div>

            </main>
        </div>

        <!-- ==================== TEACHER PANEL WORKSPACE ==================== -->
        <div v-else-if="loggedInUserType === 'teacher'" class="max-w-full mx-auto px-4 md:px-8 py-8 flex-grow w-full flex flex-col md:flex-row gap-6 text-left">
            
            <!-- Sidebar (Left navigation) -->
            <aside class="w-full md:w-96 flex flex-col gap-3">
                <div class="card-3d p-6 rounded-2xl flex flex-col gap-4 min-h-[500px]">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider px-4 py-1">// O'QITUVCHI PROFILI</span>
                    
                    <!-- Profile Card -->
                    <div class="p-4 bg-slate-50 border rounded-2xl flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl font-bold shadow-md">
                                🧑‍🏫
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-black text-slate-800">[[ staffList.find(t => t.id === loggedInTeacherId)?.name ]]</span>
                                <span class="text-[10px] font-mono text-blue-600 font-bold uppercase">[[ staffList.find(t => t.id === loggedInTeacherId)?.role ]]</span>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation tabs -->
                    <div class="flex flex-col gap-2 mt-4">
                        <button 
                            @click="activeTeacherTab = 'students'" 
                            class="w-full text-left px-5 py-4 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                            :class="activeTeacherTab === 'students' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                        >
                            🎓 O'QUVCHILAR BILIMI
                        </button>
                        
                        <button 
                            @click="activeTeacherTab = 'feedback'" 
                            class="w-full text-left px-5 py-4 rounded-xl font-extrabold text-sm flex items-center gap-3 transition-all"
                            :class="activeTeacherTab === 'feedback' ? 'bg-[#0066cc] text-white border-b-4 border-b-[#004fad]' : 'bg-transparent text-gray-600 hover:bg-gray-100/70 border-b-2 border-b-transparent'"
                        >
                            ✍️ TAVSIYALAR BERISH
                        </button>
                    </div>

                    <div class="mt-auto p-4 bg-blue-50 border border-blue-100 rounded-xl text-xs text-blue-800 leading-relaxed font-semibold">
                        💡 Tizim orqali o'quvchilarning imtihon ko'rsatkichlarini kuzatib borishingiz va qiyinchiliklar bo'yicha tushunchalar yozishingiz mumkin.
                    </div>
                </div>
            </aside>

            <!-- Main Panel (Right side) -->
            <main class="flex-grow flex flex-col gap-6">
                
                <!-- TAB: STUDENTS PERFORMANCE -->
                <div v-if="activeTeacherTab === 'students'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 animate-fadeIn">
                    <div class="border-b pb-4 flex flex-col text-left">
                        <h2 class="text-base font-black text-slate-800 tracking-tight uppercase">O'quvchilar Bilimi Va Natijalari</h2>
                        <span class="text-[9px] font-mono text-gray-400 uppercase">// O'quvchilar reytingi, imtihon ko'rsatkichlari va o'rtacha ballari</span>
                    </div>

                    <div class="overflow-x-auto text-[11px]">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-gray-400 font-mono border-b pb-2 uppercase text-[9px] tracking-wider">
                                    <th class="pb-2 font-bold">O'quvchi</th>
                                    <th class="pb-2 font-bold text-center">Guruh</th>
                                    <th class="pb-2 font-bold text-center">Topshirgan testlar</th>
                                    <th class="pb-2 font-bold text-center">O'rtacha ball</th>
                                    <th class="pb-2 font-bold text-center">Bilim darajasi</th>
                                    <th class="pb-2 font-bold text-right">Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="s in studentsList" :key="s.id" class="border-b hover:bg-slate-50/50">
                                    <td class="py-3 font-bold text-slate-700">[[ s.name ]]</td>
                                    <td class="py-3 text-center text-gray-500 font-mono font-bold">[[ s.class_name ]]</td>
                                    <td class="py-3 text-center font-mono font-bold text-slate-800">
                                        [[ studentTestAttemptsList.filter(item => item.student_id === s.id).length ]] marta
                                    </td>
                                    <td class="py-3 text-center">
                                        <span class="px-2 py-0.5 rounded font-mono font-bold text-xs" :class="getAverageScoreClassForStudent(s.id)">
                                            [[ getAverageScoreForStudent(s.id) ]] / 20
                                        </span>
                                    </td>
                                    <td class="py-3 text-center">
                                        <span 
                                            class="px-2.5 py-1 rounded-full text-[9px] font-extrabold shadow-sm"
                                            :class="[
                                                parseFloat(getAverageScoreForStudent(s.id)) >= 18 
                                                    ? 'bg-emerald-100 text-emerald-800' 
                                                    : parseFloat(getAverageScoreForStudent(s.id)) >= 15 
                                                        ? 'bg-amber-100 text-amber-800' 
                                                        : 'bg-rose-100 text-rose-800'
                                            ]"
                                        >
                                            [[ 
                                                parseFloat(getAverageScoreForStudent(s.id)) >= 18 
                                                    ? '🏆 A\'lochi' 
                                                    : parseFloat(getAverageScoreForStudent(s.id)) >= 15 
                                                        ? '⚡️ O\'rtacha' 
                                                        : '⚠️ Zaif (Qoniqarsiz)' 
                                            ]]
                                        </span>
                                    </td>
                                    <td class="py-3 text-right">
                                        <button 
                                            @click="selectedFeedbackStudentId = s.id; activeTeacherTab = 'feedback'"
                                            class="px-2.5 py-1.5 bg-[#0066cc] text-white rounded-lg font-bold text-[9px] transition-all hover:bg-blue-600"
                                        >
                                            ✍️ Tushuncha berish
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TAB: FEEDBACK WRITING -->
                <div v-else-if="activeTeacherTab === 'feedback'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 animate-fadeIn">
                    <div class="border-b pb-4 flex flex-col text-left">
                        <h2 class="text-base font-black text-slate-800 tracking-tight uppercase">O'quvchiga Tavsiya Va Tushuncha Yuborish</h2>
                        <span class="text-[9px] font-mono text-gray-400 uppercase">// Test savollari yoki amaliy darslar bo'yicha yo'riqnomalar yozish</span>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 text-xs font-semibold">
                        <!-- Left: Form to submit feedback -->
                        <div class="p-5 bg-slate-50 border rounded-2xl flex flex-col gap-4">
                            <span class="font-black text-slate-700 block uppercase tracking-wide">// YANGI TUSHUNCHA YUBORISH</span>
                            
                            <div class="flex flex-col gap-1.5 text-left">
                                <label class="text-gray-500 font-bold">O'quvchini tanlang:</label>
                                <select v-model="selectedFeedbackStudentId" class="p-2.5 rounded-xl border bg-white font-semibold text-slate-700 text-xs">
                                    <option v-for="s in studentsList" :key="s.id" :value="s.id">
                                        [[ s.name ]] ([[ s.class_name ]])
                                    </option>
                                </select>
                            </div>
                            
                            <div class="flex flex-col gap-1.5 text-left">
                                <label class="text-gray-500 font-bold">Tavsiya va Tushuntirish matni:</label>
                                <textarea 
                                    v-model="newFeedbackMessage" 
                                    placeholder="Masalan: Yo'l belgilari va imtihondagi tezlik savollariga ko'proq e'tibor bering..." 
                                    rows="6"
                                    class="p-3 rounded-xl border bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20 text-xs animate-none"
                                ></textarea>
                            </div>
                            
                            <button 
                                @click="submitFeedbackFromTeacher"
                                class="w-full py-3 bg-[#0066cc] hover:bg-blue-600 text-white rounded-xl font-bold uppercase transition-all shadow-md mt-2 text-center"
                            >
                                🚀 TAVSIYANI YUBORISH
                            </button>
                        </div>

                        <!-- Right: Feedback logs/history -->
                        <div class="flex flex-col gap-4">
                            <span class="font-black text-slate-700 block uppercase tracking-wide">// YUBORILGAN TAVSIYALAR TARIXI</span>
                            
                            <div class="max-h-[350px] overflow-y-auto space-y-2.5 pr-1">
                                <div v-if="studentFeedbackList.length === 0" class="text-center py-10 text-gray-400 font-semibold">
                                    Hozircha yuborilgan tavsiyalar mavjud emas.
                                </div>
                                <div 
                                    v-else
                                    v-for="f in studentFeedbackList" 
                                    :key="f.id"
                                    class="p-3 bg-white border border-gray-100 rounded-xl shadow-sm flex flex-col gap-2"
                                >
                                    <div class="flex justify-between items-center text-[9px] font-mono text-gray-400">
                                        <span class="font-bold text-[#0066cc]">🎓 [[ studentsList.find(s => s.id === f.student_id)?.name || 'O\'quvchi' ]]</span>
                                        <span>[[ f.date ]]</span>
                                    </div>
                                    <p class="text-xs text-slate-700 leading-relaxed font-semibold">[[ f.message ]]</p>
                                    <div class="flex justify-between items-center border-t pt-2 text-[9px] font-mono text-gray-400">
                                        <span>Yozdi: [[ f.teacher_name ]]</span>
                                        <button 
                                            @click="deleteFeedbackByTeacher(f.id)"
                                            class="text-rose-600 hover:underline font-bold"
                                        >
                                            🗑 O'chirish
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>

        <!-- ==================== STUDENT WORKSPACE ==================== -->
        <main v-else class="w-full py-4 md:py-6 flex-grow flex flex-col items-center justify-start gap-4 px-3 sm:px-4 md:px-6 max-w-full overflow-x-hidden">
            
            <!-- Main Content Area -->
            <div class="flex-grow flex flex-col gap-4 w-full min-w-0 max-w-md mx-auto">

                <!-- Loading State -->
                <div v-if="loading" class="flex-grow flex flex-col items-center justify-center py-20">
                    <div class="w-12 h-12 border-4 border-[#0066cc]/20 border-t-[#0066cc] rounded-full animate-spin mb-4"></div>
                    <span class="text-sm font-semibold text-gray-500">Test yuklanmoqda...</span>
                </div>

            <!-- ==================== STUDENT MOBILE DASHBOARD VIEW (EXACT SCREENSHOT MATCH) ==================== -->
            <div v-if="!loading && (loggedInUserType === 'student' || (!isAdminMode && loggedInUserType === 'admin')) && activeStudentTab === 'dashboard'" class="w-full max-w-md mx-auto flex flex-col gap-4 animate-fadeIn text-left pb-20">
                
                <!-- Profile Header -->
                <div class="flex items-center gap-3.5 pt-1">
                    <div @click="openPhotoSourceModal" class="relative group w-14 h-14 rounded-full border-2 border-blue-500 overflow-hidden cursor-pointer shadow-md flex items-center justify-center bg-slate-50 shrink-0">
                        <img 
                            v-if="currentStudent?.profile_image" 
                            :src="currentStudent.profile_image" 
                            class="w-full h-full object-cover" 
                        />
                        <span v-else class="text-3xl">👤</span>
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-[8px] text-white font-extrabold uppercase tracking-wide opacity-0 group-hover:opacity-100 transition-opacity text-center px-0.5">
                            [[ t('change_photo') === 'change_photo' ? 'O\'zgartirish' : t('change_photo') ]]
                        </div>
                    </div>
                    
                    <div class="flex flex-col min-w-0">
                        <h2 class="text-base font-black text-slate-900 dark:text-white uppercase tracking-tight truncate">
                            [[ currentStudent?.name || studentPanelNameSetting || 'XAYITOV AZIZBEK' ]]
                        </h2>
                        <span class="text-xs font-semibold text-gray-400">
                            [[ currentStudent ? t('student_title') : 'O\'quvchi' ]]
                        </span>
                    </div>
                </div>

                <!-- Davomat statistikasi Card -->
                <div class="bg-white dark:bg-slate-800 p-4 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 flex flex-col gap-3.5">
                    <h3 class="text-sm font-black text-slate-900 dark:text-white">Davomat statistikasi</h3>
                    
                    <div class="grid grid-cols-2 gap-3 text-xs border-b border-slate-100 dark:border-slate-700/60 pb-3">
                        <div class="flex flex-col gap-0.5">
                            <span class="text-[11px] font-medium text-gray-400">Boshlanish sanasi</span>
                            <span class="text-sm font-black text-slate-900 dark:text-slate-100">[[ studentStartDate(currentStudent) ]]</span>
                        </div>
                        <div class="flex flex-col gap-0.5 border-l border-slate-200 dark:border-slate-700 pl-3">
                            <span class="text-[11px] font-medium text-gray-400">Tugash sanasi</span>
                            <span class="text-sm font-black text-slate-900 dark:text-slate-100">[[ studentEndDate(currentStudent) ]]</span>
                        </div>
                    </div>

                    <!-- Progress bar & stats -->
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <div class="flex-grow h-1.5 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-[#10b981] rounded-full transition-all duration-300" :style="{ width: currentStudentAttendanceStats.percent + '%' }"></div>
                            </div>
                            <span class="text-xs font-black text-slate-800 dark:text-slate-200 whitespace-nowrap">[[ currentStudentAttendanceStats.percent ]]%</span>
                        </div>
                        <div class="text-[11px] font-medium text-gray-400 flex items-center gap-1.5">
                            <span>[[ currentStudentAttendanceStats.total ]] dars</span>
                            <span>·</span>
                            <span>[[ currentStudentAttendanceStats.present ]] tugallangan</span>
                            <span>·</span>
                            <span class="text-red-500 font-bold">[[ currentStudentAttendanceStats.absent ]] qoldirilgan</span>
                        </div>
                    </div>

                    <!-- Green QR Davomat button -->
                    <button 
                        @click="showQrModal = true"
                        class="w-full py-3 bg-[#22c55e] hover:bg-[#16a34a] active:scale-98 text-white rounded-2xl font-bold text-sm transition-all shadow-sm flex items-center justify-center gap-2 mt-1"
                    >
                        <span class="text-base">📷</span>
                        <span>QR davomat</span>
                    </button>
                </div>

                <!-- Avtodrom holati Card -->
                <div 
                    @click="activeStudentTab = 'group_details'"
                    class="bg-white dark:bg-slate-800 p-4 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                >
                    <div class="flex flex-col gap-0.5 text-left">
                        <h4 class="text-sm font-black text-slate-900 dark:text-white">Avtodrom holati</h4>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">SAM AVTO CLASS</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold">
                            Yuborilgan
                        </span>
                        <span class="text-gray-300 dark:text-gray-600 font-bold text-lg leading-none">›</span>
                    </div>
                </div>

                <!-- Bo'limlar Card -->
                <div class="flex flex-col gap-2 text-left">
                    <h3 class="text-sm font-black text-slate-900 dark:text-white px-1">Bo'limlar</h3>
                    
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 divide-y divide-slate-100 dark:divide-slate-700/60 overflow-hidden">
                        
                        <!-- Darslar -->
                        <div 
                            @click="activeStudentTab = 'lessons'"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                    📖
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">[[ t('lessons') ]]</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                        <!-- Testlar -->
                        <div 
                            @click="activeStudentTab = 'tests'"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                    📋
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">[[ t('tests') ]]</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                        <!-- Dars jadvali -->
                        <div 
                            @click="activeStudentTab = 'schedule'"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                    📅
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">[[ t('schedule') ]]</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                        <!-- Davomatlar -->
                        <div 
                            @click="activeStudentTab = 'attendance'"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                    🕒
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">[[ t('attendance') ]]</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                        <!-- Jarimalar -->
                        <div 
                            @click="activeStudentTab = 'penalties'"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                    ℹ️
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">[[ t('penalties') ]]</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                        <!-- Guruh tafsilotlari -->
                        <div 
                            @click="activeStudentTab = 'group_details'"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-2xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                    👥
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">Guruh tafsilotlari</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ==================== GURUH TAFSILOTLARI VIEW ==================== -->
            <div v-if="!loading && (loggedInUserType === 'student' || (!isAdminMode && loggedInUserType === 'admin')) && activeStudentTab === 'group_details'" class="w-full max-w-md mx-auto flex flex-col gap-4 animate-fadeIn text-left pb-20">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-1 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>

                <!-- Group Info Header Card -->
                <div class="bg-white dark:bg-slate-800 p-5 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">O'quv guruhi</span>
                            <h3 class="text-base font-black text-slate-900 dark:text-white uppercase">SAM AVTO CLASS</h3>
                        </div>
                        <span class="bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-bold">
                            Faol guruh
                        </span>
                    </div>
                </div>

                <!-- O'qituvchilar Section -->
                <div class="flex flex-col gap-2 text-left mt-1">
                    <h3 class="text-sm font-black text-slate-900 dark:text-white px-1">O'qituvchilar</h3>
                    
                    <div class="flex flex-col gap-2.5">
                        <div 
                            v-for="t in teachersDisplayList" 
                            :key="t.name"
                            class="bg-white dark:bg-slate-800 p-3.5 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 flex items-center gap-3.5 transition-all"
                        >
                            <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                👤
                            </div>
                            <div class="flex flex-col min-w-0">
                                <h4 class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-tight truncate">[[ t.name ]]</h4>
                                <span class="text-[11px] font-semibold text-gray-500 dark:text-gray-400">[[ t.role ]]</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mashinalar Section -->
                <div class="flex flex-col gap-2 text-left mt-1">
                    <h3 class="text-sm font-black text-slate-900 dark:text-white px-1">Mashinalar</h3>
                    
                    <div class="flex flex-col gap-2.5">
                        <div 
                            v-for="car in carsDisplayList" 
                            :key="car.plate"
                            class="bg-white dark:bg-slate-800 p-3.5 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 flex items-center gap-3.5 transition-all"
                        >
                            <!-- Car thumbnail -->
                            <div class="w-14 h-14 rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-900 shrink-0 border border-slate-200 dark:border-slate-700 flex items-center justify-center">
                                <img 
                                    :src="car.image" 
                                    :alt="car.name" 
                                    class="w-full h-full object-cover"
                                    onerror="this.src='https://images.unsplash.com/photo-1552519507-da3b142c6e3d?w=300&auto=format&fit=crop&q=80'"
                                />
                            </div>
                            
                            <!-- Car info & plate badge -->
                            <div class="flex flex-col gap-1 min-w-0">
                                <h4 class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-tight truncate">[[ car.name ]]</h4>
                                <span class="bg-blue-50 dark:bg-blue-950/70 text-[#0066cc] dark:text-blue-400 font-black px-2.5 py-0.5 rounded-lg text-xs tracking-wider font-mono self-start border border-blue-100 dark:border-blue-800/40">
                                    [[ car.plate ]]
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- STUDENT SAVED VIEW -->
            <div v-if="!loading && (loggedInUserType === 'student' || (!isAdminMode && loggedInUserType === 'admin')) && activeStudentTab === 'saved'" class="w-full max-w-md mx-auto flex flex-col gap-4 animate-fadeIn text-left pb-20">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-2 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>
                <div class="bg-white dark:bg-slate-800 p-5 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 flex flex-col gap-4">
                    <h3 class="text-base font-black text-slate-800 dark:text-white">🔖 Saqlangan materiallar</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Bu yerda siz qayta ko'rish uchun saqlab qo'ygan test savollari va darsliklar ro'yxati chiqadi.</p>
                    <div class="p-6 bg-slate-50 dark:bg-slate-900/60 rounded-2xl border border-slate-100 dark:border-slate-700 text-center text-xs text-gray-400 font-bold">
                        Hozircha saqlangan materiallar mavjud emas
                    </div>
                </div>
            </div>

            <!-- STUDENT PROFIL VIEW -->
            <div v-if="!loading && (loggedInUserType === 'student' || (!isAdminMode && loggedInUserType === 'admin')) && activeStudentTab === 'profile'" class="w-full max-w-md mx-auto flex flex-col gap-4 animate-fadeIn text-left pb-20">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-1 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>

                <!-- Profile Top Card -->
                <div class="bg-white dark:bg-slate-800 p-5 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 flex flex-col gap-4">
                    <div class="flex items-center gap-4 border-b border-slate-100 dark:border-slate-700 pb-4">
                        <div @click="openPhotoSourceModal" class="relative group w-16 h-16 rounded-full border-2 border-blue-500 overflow-hidden cursor-pointer shadow-md flex items-center justify-center bg-slate-50 shrink-0">
                            <img v-if="currentStudent?.profile_image" :src="currentStudent.profile_image" class="w-full h-full object-cover" />
                            <span v-else class="text-3xl">👤</span>
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-[8px] text-white font-extrabold uppercase tracking-wide opacity-0 group-hover:opacity-100 transition-opacity text-center px-0.5">
                                [[ t('change_photo') === 'change_photo' ? 'O\'zgartirish' : t('change_photo') ]]
                            </div>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <h3 class="text-base font-black text-slate-900 dark:text-white uppercase truncate">[[ currentStudent?.name || studentPanelNameSetting || 'MADINA RUSTAMOVA' ]]</h3>
                            <span class="text-xs font-semibold text-gray-400">Guruh: [[ currentStudent?.class_name || 'A-10' ]]</span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2.5 text-xs">
                        <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-700/60">
                            <span class="text-gray-400 font-bold">Login:</span>
                            <span class="font-mono font-bold text-slate-700 dark:text-slate-200">[[ currentStudent?.login || 'madina' ]]</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-700/60">
                            <span class="text-gray-400 font-bold">Telefon:</span>
                            <span class="font-mono font-bold text-slate-700 dark:text-slate-200">[[ currentStudent?.phone || '+998 90 123-45-67' ]]</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-slate-100 dark:border-slate-700/60">
                            <span class="text-gray-400 font-bold">Obuna holati:</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Faol</span>
                        </div>
                    </div>
                </div>

                <!-- Profil Bo'limlari Card -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 divide-y divide-slate-100 dark:divide-slate-700/60 overflow-hidden">
                    
                    <!-- Shaxsiy ma'lumotlar Menu Item -->
                    <div 
                        @click="activeStudentTab = 'personal_info'"
                        class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                    >
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                👤
                            </div>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Shaxsiy ma'lumotlar</span>
                        </div>
                        <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                    </div>

                    <!-- Parolni almashtirish Menu Item -->
                    <div 
                        @click="showChangePasswordModal = true"
                        class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                    >
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center text-xl shrink-0">
                                🔒
                            </div>
                            <span class="text-sm font-bold text-slate-800 dark:text-white">Parolni almashtirish</span>
                        </div>
                        <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                    </div>

                </div>

                <!-- Logout Button -->
                <button 
                    @click="handleLogout"
                    class="w-full py-3.5 bg-rose-600 hover:bg-rose-700 active:scale-98 text-white rounded-2xl font-bold text-xs uppercase tracking-wider transition-all shadow-md mt-1 flex items-center justify-center gap-2"
                >
                    <span>🚪</span>
                    <span>TIZIMDAN CHIQISH</span>
                </button>
            </div>

            <!-- DEDICATED SHAXSIY MA'LUMOTLAR VIEW -->
            <div v-if="!loading && (loggedInUserType === 'student' || (!isAdminMode && loggedInUserType === 'admin')) && activeStudentTab === 'personal_info'" class="w-full max-w-md mx-auto flex flex-col gap-4 animate-fadeIn text-left pb-20">
                <button @click="activeStudentTab = 'profile'" class="self-start mb-1 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    ← Profilga qaytish
                </button>

                <!-- Shaxsiy ma'lumotlar Card -->
                <div class="flex flex-col gap-2 text-left">
                    <h3 class="text-sm font-black text-slate-900 dark:text-white px-1">Shaxsiy ma'lumotlar</h3>
                    
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-slate-100 dark:border-slate-700 divide-y divide-slate-100 dark:divide-slate-700/60 overflow-hidden">
                        
                        <!-- Passport -->
                        <div class="p-4 flex items-center justify-between">
                            <div class="flex items-center gap-3.5">
                                <div class="w-10 h-10 rounded-xl bg-cyan-50 dark:bg-cyan-950/60 text-cyan-600 dark:text-cyan-400 flex items-center justify-center text-xl shrink-0">
                                    💳
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-800 dark:text-white">Passport</span>
                                    <span class="text-xs font-mono font-medium text-gray-400">
                                        [[ showPassportFull ? (currentStudent?.passport || 'AD 1234529') : (currentStudent?.passport ? currentStudent.passport.slice(0, 2) + ' ****' + currentStudent.passport.slice(-2) : 'AD ****29') ]]
                                    </span>
                                </div>
                            </div>
                            <button 
                                @click="showPassportFull = !showPassportFull"
                                class="text-blue-600 dark:text-blue-400 text-xl hover:scale-110 active:scale-95 transition-all p-1"
                                title="Ko'rish / Yashirish"
                            >
                                👁
                            </button>
                        </div>

                        <!-- Berilgan joy -->
                        <div class="p-4 flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-sky-50 dark:bg-sky-950/60 text-sky-600 dark:text-sky-400 flex items-center justify-center text-xl shrink-0">
                                🗺️
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800 dark:text-white">Berilgan joy</span>
                                <span class="text-xs font-semibold text-gray-400 uppercase">
                                    [[ currentStudent?.issued_by || 'SAMARQAND VILOYATI URGUT TUMANI IIB' ]]
                                </span>
                            </div>
                        </div>

                        <!-- Tug'ilgan sana -->
                        <div class="p-4 flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center text-xl shrink-0">
                                📅
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800 dark:text-white">Tug'ilgan sana</span>
                                <span class="text-xs font-mono font-semibold text-gray-400">
                                    [[ currentStudent?.birthdate || '2006-09-26' ]]
                                </span>
                            </div>
                        </div>

                        <!-- Telefon -->
                        <div class="p-4 flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-rose-50 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 flex items-center justify-center text-xl shrink-0">
                                📞
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800 dark:text-white">Telefon</span>
                                <span class="text-xs font-mono font-semibold text-gray-400">
                                    [[ currentStudent?.phone || 'Noma\'lum' ]]
                                </span>
                            </div>
                        </div>

                        <!-- Manzil -->
                        <div class="p-4 flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-950/60 text-blue-600 dark:text-blue-400 flex items-center justify-center text-xl shrink-0">
                                ↗️
                            </div>
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-slate-800 dark:text-white">Manzil</span>
                                <span class="text-xs font-semibold text-gray-400">
                                    [[ currentStudent?.address || 'Noma\'lum' ]]
                                </span>
                            </div>
                        </div>

                        <!-- Parolni almashtirish -->
                        <div 
                            @click="showChangePasswordModal = true"
                            class="p-4 flex items-center justify-between cursor-pointer hover:bg-slate-50/80 dark:hover:bg-slate-750 transition-all"
                        >
                            <div class="flex items-center gap-3.5">
                                <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center text-xl shrink-0">
                                    🔒
                                </div>
                                <span class="text-sm font-bold text-slate-800 dark:text-white">Parolni almashtirish</span>
                            </div>
                            <span class="text-gray-300 dark:text-gray-600 font-bold text-lg">›</span>
                        </div>

                    </div>
                </div>
            </div>
            <div v-if="!loading && loggedInUserType === 'student' && activeStudentTab === 'lessons'" class="w-full max-w-2xl ml-0 flex flex-col gap-4 animate-fadeIn text-left">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-4 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>
                <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 flex flex-col gap-4">
                    <h2 class="text-base font-black text-slate-800 uppercase tracking-wider">// [[ t('lessons').toUpperCase() ]]</h2>
                    <div class="flex flex-col gap-3">
                        <div 
                            v-for="lesson in lessonsListMock" 
                            :key="lesson.id"
                            @click="selectedLessonId = lesson.id"
                            class="p-4 bg-slate-50 hover:bg-slate-100/70 rounded-2xl border border-slate-100 flex flex-col gap-1 cursor-pointer transition-all"
                        >
                            <span class="text-xs font-extrabold text-blue-600 uppercase tracking-wide">[[ lesson.title ]]</span>
                            <p class="text-[11px] text-gray-500 font-medium line-clamp-2">[[ lesson.desc ]]</p>
                        </div>
                    </div>
                </div>

                <!-- Lesson Detail Modal -->
                <div v-if="selectedLessonId !== null" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
                    <div class="bg-white p-6 rounded-3xl max-w-sm w-full flex flex-col gap-4 shadow-2xl text-left border border-slate-100 animate-scaleUp">
                        <h3 class="text-sm font-black text-[#0066cc] uppercase tracking-wide leading-tight">[[ lessonsListMock.find(l => l.id === selectedLessonId)?.title ]]</h3>
                        <p class="text-xs text-slate-700 leading-relaxed font-semibold">[[ lessonsListMock.find(l => l.id === selectedLessonId)?.desc ]]</p>
                        <button 
                            @click="selectedLessonId = null"
                            class="w-full py-3 bg-[#0066cc] text-white rounded-2xl text-xs font-bold uppercase tracking-wider mt-2 border-b-4 border-b-blue-800"
                        >
                            [[ t('close') ]]
                        </button>
                    </div>
                </div>
            </div>

            <!-- STUDENT CLASS SCHEDULE -->
            <div v-if="!loading && loggedInUserType === 'student' && activeStudentTab === 'schedule'" class="w-full max-w-2xl ml-0 flex flex-col gap-4 animate-fadeIn text-left">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-4 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>
                <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 flex flex-col gap-4">
                    <h2 class="text-base font-black text-slate-800 uppercase tracking-wider">// [[ t('schedule').toUpperCase() ]]</h2>
                    <div class="flex flex-col gap-3 text-xs">
                        <div class="p-4 bg-blue-50/60 border border-blue-100 rounded-2xl flex flex-col gap-2">
                            <span class="text-[10px] font-bold text-blue-800 uppercase font-mono">📅 [[ currentLang === 'uz_lat' ? 'NAZARIY MASHG\'ULOTLAR' : currentLang === 'en' ? 'THEORY CLASSES' : currentLang === 'ru' ? 'ТЕОРЕТИЧЕСКИЕ ЗАНЯТИЯ' : 'NAZARIY MASHǴULOTLAR' ]]</span>
                            <div class="flex justify-between items-center text-slate-700 font-bold">
                                <span>[[ currentLang === 'uz_lat' ? 'Dushanba, Chorshanba, Juma' : currentLang === 'en' ? 'Monday, Wednesday, Friday' : currentLang === 'ru' ? 'Понедельник, Среда, Пятница' : 'Dúyshembi, Sárshembi, Juma' ]]</span>
                                <span class="font-mono text-xs">18:00 - 20:00</span>
                            </div>
                        </div>
                        <div class="p-4 bg-emerald-50/60 border border-emerald-100 rounded-2xl flex flex-col gap-2">
                            <span class="text-[10px] font-bold text-emerald-800 uppercase font-mono">🚗 [[ currentLang === 'uz_lat' ? 'AMALIY MASHG\'ULOTLAR' : currentLang === 'en' ? 'PRACTICAL CLASSES' : currentLang === 'ru' ? 'ПРАКТИЧЕСКИЕ ЗАНЯТИЯ' : 'AMALIY MASHǴULOTLAR' ]]</span>
                            <div class="flex justify-between items-center text-slate-700 font-bold">
                                <span>[[ currentLang === 'uz_lat' ? 'Seshanba, Payshanba' : currentLang === 'en' ? 'Tuesday, Thursday' : currentLang === 'ru' ? 'Вторник, Четверг' : 'Sheshembi, Páshembi' ]]</span>
                                <span class="font-mono text-xs">09:00 - 12:00</span>
                            </div>
                        </div>
                        <div class="p-4 bg-slate-50 border rounded-2xl flex items-center justify-between">
                            <div class="flex flex-col gap-0.5">
                                <span class="text-[9px] text-gray-400 font-bold uppercase">[[ currentLang === 'uz_lat' ? 'Amaliy yo\'riqchi' : currentLang === 'en' ? 'Driving Instructor' : currentLang === 'ru' ? 'Практический инструктор' : 'Kómekshi aydawshı' ]]</span>
                                <span class="font-bold text-slate-700">Jamshid Tojiyev</span>
                            </div>
                            <span class="text-xs bg-slate-200 px-2.5 py-1 rounded-full font-bold text-slate-600">[[ currentLang === 'uz_lat' ? 'B toifa' : currentLang === 'en' ? 'Category B' : currentLang === 'ru' ? 'Категория B' : 'B toifası' ]]</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STUDENT ATTENDANCE HISTORY -->
            <div v-if="!loading && loggedInUserType === 'student' && activeStudentTab === 'attendance'" class="w-full max-w-3xl ml-0 flex flex-col gap-4 animate-fadeIn text-left">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-4 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>
                <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 flex flex-col gap-4">
                    <h2 class="text-base font-black text-slate-800 uppercase tracking-wider">// [[ t('attendance_history') ]]</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="border-b text-gray-400 font-mono text-[9px] uppercase tracking-wider">
                                    <th class="pb-2 font-bold">[[ t('date') ]]</th>
                                    <th class="pb-2 font-bold">[[ t('topic') ]]</th>
                                    <th class="pb-2 font-bold text-right">[[ t('status') ]]</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="a in getStudentAttendance(currentStudent?.id)" :key="a.id" class="border-b">
                                    <td class="py-3 font-mono font-bold text-slate-700">[[ a.date ]]</td>
                                    <td class="py-3 text-gray-500 font-semibold">[[ a.topic ]]</td>
                                    <td class="py-3 text-right">
                                        <span 
                                            class="px-2 py-0.5 rounded font-bold text-[9px]"
                                            :class="a.status === 'Keldi' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800'"
                                        >
                                            [[ tStatus(a.status) ]]
                                        </span>
                                    </td>
                                </tr>
                                <tr v-if="getStudentAttendance(currentStudent?.id).length === 0">
                                    <td colspan="3" class="py-4 text-center text-gray-400 font-medium">[[ t('no_attendance_history') ]]</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TIZIMGA KIRISH/CHIQISH TARIXI (Activity Logs) -->
                <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 flex flex-col gap-4">
                    <h2 class="text-base font-black text-slate-800 uppercase tracking-wider">// [[ t('activity_history') ]]</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="border-b text-gray-400 font-mono text-[9px] uppercase tracking-wider">
                                    <th class="pb-2 font-bold">[[ t('login_time') ]]</th>
                                    <th class="pb-2 font-bold text-right">[[ t('logout_time') ]]</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr 
                                    v-for="log in studentActivityLogs.filter(l => l.student_id === currentStudent?.id)" 
                                    :key="log.id" 
                                    class="border-b"
                                >
                                    <td class="py-3 font-mono font-bold text-slate-700">[[ log.login_time ]]</td>
                                    <td class="py-3 text-right">
                                        <span 
                                            class="px-2 py-0.5 rounded font-bold text-[9px]"
                                            :class="log.logout_time === 'Ayni vaqtda faol' ? 'bg-emerald-100 text-emerald-800 animate-pulse' : 'bg-slate-100 text-slate-500'"
                                        >
                                            [[ log.logout_time === 'Ayni vaqtda faol' ? t('currently_active') : log.logout_time ]]
                                        </span>
                                    </td>
                                </tr>
                                <tr v-if="studentActivityLogs.filter(l => l.student_id === currentStudent?.id).length === 0">
                                    <td colspan="2" class="py-4 text-center text-gray-400 font-medium">[[ t('no_activity_history') ]]</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- STUDENT PENALTIES -->
            <div v-if="!loading && loggedInUserType === 'student' && activeStudentTab === 'penalties'" class="w-full max-w-2xl ml-0 flex flex-col gap-4 animate-fadeIn text-left">
                <button @click="activeStudentTab = 'dashboard'" class="self-start mb-4 text-sm font-bold text-[#0066cc] flex items-center gap-1.5 hover:underline">
                    [[ t('back_to_dashboard') ]]
                </button>
                <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 flex flex-col gap-4">
                    <h2 class="text-base font-black text-slate-800 uppercase tracking-wider">// [[ t('penalties_status') ]]</h2>
                    
                    <!-- If no penalties -->
                    <div 
                        v-if="studentPenaltiesList.filter(p => p.student_id === currentStudent?.id).length === 0"
                        class="p-6 bg-slate-50 border border-slate-100 rounded-3xl text-center flex flex-col items-center gap-3"
                    >
                        <span class="text-4xl">🛡️</span>
                        <h3 class="text-xs font-black text-slate-800">[[ t('no_penalties') ]]</h3>
                        <p class="text-[11px] text-gray-500 leading-relaxed font-semibold">[[ t('no_penalties_desc') ]]</p>
                    </div>

                    <!-- If has penalties -->
                    <div v-else class="flex flex-col gap-3">
                        <div 
                            v-for="p in studentPenaltiesList.filter(p => p.student_id === currentStudent?.id)" 
                            :key="p.id"
                            class="p-4 bg-slate-50 rounded-2xl border border-slate-100 flex flex-col gap-2 transition-all"
                        >
                            <div class="flex justify-between items-start gap-2">
                                <span class="text-xs font-black text-slate-800 leading-snug">[[ p.title ]]</span>
                                <span 
                                    class="px-2.5 py-0.5 rounded-full text-[9px] font-extrabold uppercase"
                                    :class="p.status === 'To\'langan' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800'"
                                >
                                    [[ p.status === 'To\'langan' ? (currentLang === 'uz_lat' ? 'To\'langan' : currentLang === 'en' ? 'Paid' : currentLang === 'ru' ? 'Оплачено' : 'Tólengen') : (currentLang === 'uz_lat' ? 'To\'lanmagan' : currentLang === 'en' ? 'Unpaid' : currentLang === 'ru' ? 'Не оплачено' : 'Tólenbegen') ]]
                                </span>
                            </div>
                            
                            <div class="flex justify-between items-center text-[10px] text-gray-400 font-mono border-t pt-2 mt-1">
                                <div class="flex flex-col">
                                    <span class="text-[9px] uppercase font-bold text-gray-400">[[ t('date') ]]</span>
                                    <span class="font-bold text-slate-600">[[ p.date ]]</span>
                                </div>
                                <div class="flex flex-col text-right">
                                    <span class="text-[9px] uppercase font-bold text-gray-400">[[ t('amount') ]]</span>
                                    <span class="font-bold text-[#0066cc] text-xs">[[ p.amount.toLocaleString() ]] [[ currentLang === 'uz_lat' ? 'so\'m' : currentLang === 'en' ? 'so\'m' : currentLang === 'ru' ? 'сум' : 'so\'m' ]]</span>
                                </div>
                            </div>
                            
                            <!-- Pay fine button if unpaid -->
                            <button 
                                v-if="p.status === 'To\'lanmagan'"
                                @click="payPenalty(p.id)"
                                class="w-full py-2.5 bg-[#0066cc] hover:bg-blue-700 active:scale-95 text-white rounded-xl font-bold text-[10px] uppercase transition-all shadow-sm mt-1 text-center"
                            >
                                [[ t('pay_penalty') ]]
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Test Welcome Start Screen -->
            <div v-if="!loading && !isTestStarted && (loggedInUserType !== 'student' || activeStudentTab === 'tests')" class="flex-grow flex flex-col py-12 max-w-xl ml-0 w-full">

                <div class="card-3d p-8 rounded-3xl w-full text-center flex flex-col items-center gap-6">
                    <div class="w-20 h-20 bg-blue-50 text-[#0066cc] rounded-2xl flex items-center justify-center text-4xl shadow-sm border border-blue-100">
                        🏁
                    </div>
                    <div class="space-y-2">
                        <h2 class="text-2xl font-black text-slate-800 tracking-tight">[[ t('exam_title') ]]</h2>
                        <p class="text-xs font-semibold text-[#0066cc] uppercase tracking-wider">[[ currentLevel === 1 ? t('level_1') : t('level_2') ]]</p>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium" v-html="t('welcome_text')"></p>
                    
                    <!-- Profile Selector or Logged In Student Indicator -->
                    <div class="w-full flex flex-col gap-2 text-left bg-slate-50 p-4 rounded-2xl border border-slate-100">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-wider">// HISOBOB VARAQASI</label>
                        
                        <div v-if="loggedInUserType === 'student'" class="flex items-center justify-between text-xs font-bold text-slate-700">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">👤</span>
                                <div>
                                    <div class="text-slate-800">[[ studentsList.find(s => s.id === loggedInStudentId).name ]]</div>
                                    <div class="text-[10px] text-gray-400 uppercase font-mono">Guruh: [[ studentsList.find(s => s.id === loggedInStudentId).class_name ]]</div>
                                </div>
                            </div>
                            <span 
                                @click="handleObunaButtonClick(loggedInStudentId || selectedStudentId)"
                                class="px-2.5 py-1 rounded-full text-[9px] uppercase cursor-pointer hover:scale-105 active:scale-95 transition-all shadow-sm font-extrabold"
                                :title="getStudentSubscriptionStatusById(loggedInStudentId || selectedStudentId) === 'Faol' ? 'Obuna faol' : 'Obunani uzaytirish uchun bosing'"
                                :class="getStudentSubscriptionStatusById(loggedInStudentId || selectedStudentId) === 'Faol' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800 hover:bg-rose-200'"
                            >
                                [[ getStudentSubscriptionStatusById(loggedInStudentId || selectedStudentId) === 'Faol' ? 'Faol obuna' : 'Obuna tugagan (Uzaytirish 🔄)' ]]
                            </span>
                        </div>
                        
                        <div v-else class="flex flex-col gap-2">
                            <select 
                                v-model="selectedStudentId" 
                                class="w-full p-3 rounded-xl border text-xs bg-white font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            >
                                <option :value="null">-- O'quvchi profilini tanlang --</option>
                                <option v-for="s in studentsList" :key="s.id" :value="s.id">
                                    [[ s.name ]] ([[ s.class_name ]])
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- O'qituvchi Tavsiyalari va Tushunchalari -->
                    <div 
                        v-if="(loggedInStudentId || selectedStudentId) !== null && studentFeedbackList.filter(f => f.student_id === (loggedInStudentId || selectedStudentId)).length > 0"
                        class="w-full p-4 bg-blue-50/70 border border-blue-100 rounded-2xl flex flex-col gap-3 text-left"
                    >
                        <div class="flex items-center gap-2 text-blue-800 font-extrabold text-[10px] uppercase tracking-wider font-mono">
                            <span>🧑‍🏫 O'QITUVCHILARDAN TAVSIYA VA TUSHUNCHALAR</span>
                        </div>
                        <div class="space-y-2.5 max-h-[180px] overflow-y-auto pr-1">
                            <div 
                                v-for="f in studentFeedbackList.filter(f => f.student_id === (loggedInStudentId || selectedStudentId))"
                                :key="f.id"
                                class="p-3 bg-white border border-blue-50 rounded-xl flex flex-col gap-1 shadow-sm"
                            >
                                <div class="flex justify-between items-center text-[9px] font-mono text-gray-400">
                                    <span class="font-bold text-[#0066cc]">[[ f.teacher_name ]]</span>
                                    <span>[[ f.date ]]</span>
                                </div>
                                <p class="text-xs text-slate-700 leading-relaxed font-medium">[[ f.message ]]</p>
                            </div>
                        </div>
                    </div>

                    <!-- Block screen alert if expired -->
                    <div 
                        v-if="selectedStudentId !== null && getStudentSubscriptionStatusById(selectedStudentId) === 'Muddati tugagan'" 
                        class="w-full p-5 bg-red-50 border border-red-200 rounded-2xl flex flex-col gap-3 text-left animate-pulse"
                    >
                        <div class="flex items-center gap-2 text-red-700 font-extrabold text-sm">
                            <span>🚫 AKKAUNT BLOKLANDI (OBUNA TUGAGAN)</span>
                        </div>
                        <p class="text-xs text-red-600 leading-relaxed font-semibold">
                            Hurmatli o'quvchi, sizning oylik obuna to'lovi muddati tugaganligi sababli akkauntingiz vaqtincha bloklandi.
                            Test topshirishni davom ettirish uchun to'lovni amalga oshiring. To'lov amalga oshirilishi bilan akkaunt avtomatik ravishda ishga tushadi.
                        </p>
                        <button 
                            @click="handleObunaButtonClick(selectedStudentId)"
                            class="btn-3d w-full py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-black shadow-md transition-all border-b-[4px] border-b-emerald-800 flex items-center justify-center gap-2 cursor-pointer mt-1"
                        >
                            <span>💳 TO'LOV QILISH VA OBUNANI UZAYTIRISH (+30 KUN)</span>
                        </button>
                    </div>

                    <!-- Exam Start Button (Only visible if active) -->
                    <button 
                        v-if="selectedStudentId !== null && getStudentSubscriptionStatusById(selectedStudentId) === 'Faol'"
                        @click="startActualTest" 
                        class="btn-3d w-full py-4 bg-[#0066cc] text-white rounded-2xl text-base font-extrabold shadow-lg shadow-blue-500/20 transition-all border-b-[5px] border-b-[#004fad] hover:bg-blue-600 animate-pulse"
                    >
                        [[ t('start_btn') ]]
                    </button>
                    <div v-else-if="selectedStudentId === null" class="w-full py-4 bg-gray-100 text-gray-400 rounded-2xl text-xs font-bold text-center border border-dashed">
                        Test topshirish uchun yuqoridan profilingizni tanlang
                    </div>
                    <button 
                        v-if="loggedInUserType === 'admin'"
                        @click="triggerAdminPanelToggle"
                        class="text-xs text-gray-400 hover:text-[#0066cc] font-semibold transition-all mt-4"
                    >
                        [[ t('admin_btn') ]]
                    </button>
                </div>
            </div>

            <!-- Test Interface -->
            <div v-if="!loading && isTestStarted && questions.length > 0 && !testFinished" class="w-full flex flex-col gap-8 animate-fadeIn">

                
                <!-- Controls and Navigation Row -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 bg-[#1a2332] p-6 rounded-2xl border border-slate-700/60 shadow-lg">
                    
                    <!-- Timer and Finish button -->
                    <div class="flex items-center gap-6">
                        <!-- Circular Timer -->
                        <div class="relative w-24 h-24 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                <circle 
                                    cx="50" cy="50" r="42" 
                                    stroke="#334155" stroke-width="6" 
                                    fill="transparent" 
                                />
                                <circle 
                                    cx="50" cy="50" r="42" 
                                    stroke="#10b981" stroke-width="6" 
                                    fill="transparent" 
                                    class="timer-circle"
                                    :stroke-dasharray="263.89"
                                    :stroke-dashoffset="dashOffset"
                                />
                            </svg>
                            <span class="absolute text-xl font-bold text-white">[[ formattedTime ]]</span>
                        </div>

                        <!-- Terminate Button -->
                        <button 
                            @click="finishTest"
                            class="px-5 py-3.5 bg-slate-800/80 hover:bg-rose-900/60 hover:text-rose-300 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-300 transition-all border border-slate-700 hover:border-rose-700/60"
                        >
                            TESTNI YAKUNLASH
                        </button>

                        <!-- Back Button -->
                        <button 
                            @click="confirmAndResetTest"
                            class="px-5 py-3.5 bg-slate-800/80 hover:bg-[#0066cc]/20 hover:text-blue-300 rounded-2xl text-xs font-bold uppercase tracking-wider text-slate-300 transition-all border border-slate-700 hover:border-blue-700/60"
                        >
                            ORTGA QAYTISH
                        </button>
                    </div>

                    <!-- Navigation Pagination Grid -->
                    <div class="flex flex-col gap-2 w-full md:w-auto">
                        <div class="flex flex-wrap gap-1.5 justify-center md:justify-end max-w-md">
                            <!-- Prev Arrow -->
                            <button 
                                @click="prevQuestion"
                                :disabled="currentQuestionIndex === 0"
                                class="w-9 h-9 flex items-center justify-center border border-slate-700 bg-slate-800 text-white rounded-lg text-sm hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed font-bold"
                            >
                                &laquo;
                            </button>

                            <!-- Question Buttons -->
                            <button 
                                v-for="(q, idx) in questions"
                                :key="q.id"
                                @click="gotoQuestion(idx)"
                                class="w-9 h-9 flex items-center justify-center rounded-lg text-xs font-semibold transition-all duration-200"
                                :class="[
                                    userAnswers[q.id] !== undefined
                                        ? userAnswers[q.id] === q.correct_option_id
                                            ? 'key-3d-correct'
                                            : 'key-3d-incorrect'
                                        : currentQuestionIndex === idx
                                            ? 'key-3d-active'
                                            : 'key-3d',
                                    currentQuestionIndex === idx && userAnswers[q.id] !== undefined
                                        ? 'ring-2 ring-[#0066cc] ring-offset-2'
                                        : ''
                                ]"
                            >
                                [[ idx + 1 ]]
                            </button>

                            <!-- Next Arrow -->
                            <button 
                                @click="nextQuestion"
                                class="w-9 h-9 flex items-center justify-center border border-slate-700 bg-slate-800 text-white rounded-lg text-sm hover:bg-slate-700 disabled:opacity-50 disabled:cursor-not-allowed font-bold"
                            >
                                &raquo;
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Active Question and Options Area -->
                <div class="bg-[#1a2332] border border-slate-700/60 p-8 rounded-3xl flex flex-col items-center shadow-2xl">
                    
                    <!-- SVG Illustration representation of current question -->
                    <div class="mb-8 w-full max-w-sm h-48 bg-[#0f1728] rounded-2xl flex items-center justify-center p-6 border border-slate-800/80 shadow-inner question-illustration-container">
                        <!-- Dynamic SVG based on question index -->
                        <div v-html="getQuestionIllustration(currentQuestion)"></div>
                    </div>

                    <!-- Question Text and Action Buttons -->
                    <div class="flex flex-col items-center gap-4 mb-8 w-full max-w-5xl">
                        <h2 class="text-xl font-bold text-white text-center leading-relaxed">
                            [[ currentQuestionData.question ]]
                        </h2>
                        <div class="flex flex-wrap items-center justify-center gap-2.5">
                            <button 
                                @click="readQuestionAloud"
                                class="flex items-center gap-1.5 px-4 py-2 bg-[#223147] hover:bg-[#2c3d59] text-slate-200 rounded-full text-xs font-bold transition-all border border-slate-600/70 shadow-sm"
                            >
                                🔊 SAVOLNI TINGLASH
                            </button>
                        </div>
                    </div>

                    <!-- Answer Options Stack -->
                    <div class="w-full max-w-4xl flex flex-col gap-4">
                        <button 
                            v-for="opt in currentQuestionData.options"
                            :key="opt.id"
                            @click="selectOption(opt.id)"
                            :disabled="userAnswers[currentQuestionId] !== undefined"
                            class="w-full text-left p-5 rounded-2xl transition-all duration-150 group flex items-center justify-between border"
                            :class="[
                                userAnswers[currentQuestionId] !== undefined
                                    ? opt.id === currentCorrectOptionId
                                        ? 'bg-emerald-950/80 border-emerald-500 text-emerald-200 font-bold'
                                        : userAnswers[currentQuestionId] === opt.id
                                            ? 'bg-rose-950/80 border-rose-500 text-rose-200 font-bold'
                                            : 'bg-[#151f2d]/50 border-slate-800 text-slate-400 opacity-50'
                                    : 'bg-[#1e2a3c] border-slate-700/80 text-white hover:bg-[#26364d] hover:border-slate-500'
                            ]"
                        >
                            <span class="text-sm font-bold leading-snug pr-4">[[ opt.text ]]</span>
                            <div 
                                class="w-5 h-5 shrink-0 rounded-full border flex items-center justify-center transition-all"
                                :class="[
                                    userAnswers[currentQuestionId] !== undefined
                                        ? opt.id === currentCorrectOptionId
                                            ? 'border-emerald-400 bg-emerald-500'
                                            : userAnswers[currentQuestionId] === opt.id
                                                ? 'border-rose-400 bg-rose-500'
                                                : 'border-slate-700 bg-transparent'
                                        : userAnswers[currentQuestionId] === opt.id
                                            ? 'border-blue-400 bg-blue-500'
                                            : 'border-slate-500/70 group-hover:border-slate-300 bg-transparent'
                                ]"
                            >
                                <div v-if="userAnswers[currentQuestionId] === opt.id || (userAnswers[currentQuestionId] !== undefined && opt.id === currentCorrectOptionId)" class="w-2.5 h-2.5 rounded-full bg-white"></div>
                            </div>
                        </button>
                    </div>

                    <!-- Audio Explanation Panel -->
                    <div 
                        v-if="audioMessage"
                        class="w-full max-w-2xl mt-6 rounded-2xl p-4 flex items-start gap-3 transition-all"
                        :class="audioMessage.type === 'correct' 
                            ? 'bg-emerald-950/90 border border-emerald-600' 
                            : 'bg-amber-950/90 border border-amber-600'"
                    >
                        <span class="text-2xl mt-0.5">🔊</span>
                        <div class="flex flex-col gap-1">
                            <span 
                                class="text-xs font-bold uppercase tracking-wider"
                                :class="audioMessage.type === 'correct' ? 'text-emerald-400' : 'text-amber-400'"
                            >
                                [[ audioMessage.type === 'correct' ? '✅ TO\'G\'RI JAVOB' : '📖 TO\'G\'RI JAVOB' ]]
                            </span>
                            <p 
                                class="text-sm font-semibold leading-relaxed"
                                :class="audioMessage.type === 'correct' ? 'text-emerald-200' : 'text-amber-200'"
                            >
                                [[ audioMessage.text ]]
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Result Summary Screen -->
            <div v-if="!loading && isTestStarted && testFinished" class="w-full max-w-5xl mx-auto bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center">

                
                <!-- Pass/Fail Badge -->
                <div 
                    class="w-24 h-24 rounded-full flex items-center justify-center mb-6"
                    :class="score >= 15 ? 'bg-emerald-50 text-emerald-500' : 'bg-red-50 text-red-500'"
                >
                    <i :data-lucide="score >= 15 ? 'check-circle' : 'x-circle'" class="w-16 h-16"></i>
                </div>

                <h2 class="text-3xl font-extrabold mb-2" :class="score >= 15 ? 'text-emerald-500' : 'text-red-500'">
                    [[ getResultStatusText(score) ]]
                </h2>
                
                <p class="text-sm text-gray-500 font-medium mb-6 uppercase tracking-wider">
                    To'g'ri javoblar ko'rsatkichi: [[ score ]] / [[ questions.length ]]
                </p>

                <!-- Statistics and feedback panel -->
                <div class="w-full grid grid-cols-2 gap-4 mb-8">
                    <div class="p-4 bg-gray-50 rounded-xl text-center">
                        <span class="text-xs text-gray-400 font-bold uppercase block">// TO'G'RI JAVOBLAR</span>
                        <span class="text-2xl font-bold text-emerald-500">[[ score ]]</span>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-xl text-center">
                        <span class="text-xs text-gray-400 font-bold uppercase block">// XATO / JAVOB BERILMAGAN</span>
                        <span class="text-2xl font-bold text-red-500">[[ questions.length - score ]]</span>
                    </div>
                </div>

                <!-- Questions matrix visualizer -->
                <div class="w-full mb-8">
                    <span class="text-xs text-gray-400 font-bold uppercase block text-center mb-3">// SAVOLLAR NATIJALARI KO'RINISHI</span>
                    <div class="flex flex-wrap gap-2 justify-center">
                        <div 
                            v-for="(q, idx) in questions"
                            :key="q.id"
                            class="w-10 h-10 rounded-xl flex items-center justify-center text-xs font-bold text-white shadow-sm transition-all"
                            :class="[
                                userAnswers[q.id] === q.correct_option_id
                                    ? 'bg-emerald-500 border border-emerald-600'
                                    : 'bg-red-500 border border-red-600'
                            ]"
                        >
                            [[ idx + 1 ]]
                        </div>
                    </div>
                </div>

                <!-- Retake & Level Transition Dashboard -->
                <div class="flex flex-col gap-4 justify-center items-center w-full max-w-md mb-10">
                    <!-- Case 1: Passed (20/20 score) -> Can go to next level or retake -->
                    <template v-if="score === 20">
                        <button 
                            @click="currentLevel = currentLevel + 1; resetTest();"
                            class="w-full px-6 py-4 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl text-sm font-bold shadow-lg shadow-emerald-500/20 transition-all flex items-center justify-center gap-2"
                        >
                            <i data-lucide="play" class="w-4 h-4"></i> KEYINGI BOSQICHGA O'TISH (BOSQICH [[ currentLevel + 1 ]])
                        </button>
                        <button 
                            @click="resetTest"
                            class="w-full px-6 py-4 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-2xl text-sm font-bold transition-all flex items-center justify-center gap-2"
                        >
                            <i data-lucide="rotate-ccw" class="w-4 h-4"></i> USHBU BOSQICHNI QAYTA TOPSHIRISH
                        </button>
                    </template>

                    <!-- Case 2: Failed (score < 20) -> Must retake this level -->
                    <template v-else>
                        <div class="w-full flex flex-col items-center gap-3">
                            <span class="text-xs text-rose-500 font-bold uppercase tracking-wider bg-rose-50 px-4 py-2 rounded-full border border-rose-200 text-center">
                                🔒 KEYINGI BOSQICH QULFLANGAN (20/20 BALL TO'PLASHINGIZ SHART)
                            </span>
                            <button 
                                @click="resetTest"
                                class="w-full px-6 py-4 bg-[#0066cc] hover:bg-blue-700 text-white rounded-2xl text-sm font-bold shadow-lg shadow-blue-500/20 transition-all flex items-center justify-center gap-2"
                            >
                                <i data-lucide="rotate-ccw" class="w-4 h-4"></i> QAYTA TOPSHIRISH
                            </button>
                        </div>
                    </template>

                </div>

                <!-- Question review list -->
                <div class="w-full border-t border-gray-100 pt-8">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                        <h3 class="text-lg font-bold text-slate-800 uppercase tracking-wider">// SAVOLLAR TAHLILI</h3>
                        
                        <!-- Review Filter Tabs -->
                        <div class="flex gap-2 bg-gray-100 p-1 rounded-xl text-xs font-semibold">
                            <button 
                                @click="reviewFilter = 'all'"
                                class="px-4 py-2 rounded-lg transition-all"
                                :class="reviewFilter === 'all' ? 'bg-white text-slate-800 shadow-sm' : 'text-gray-500 hover:text-slate-800'"
                            >
                                Barchasi ([[ questions.length ]])
                            </button>
                            <button 
                                @click="reviewFilter = 'correct'"
                                class="px-4 py-2 rounded-lg transition-all text-emerald-600"
                                :class="reviewFilter === 'correct' ? 'bg-white shadow-sm font-bold' : 'text-emerald-500/70 hover:text-emerald-600'"
                            >
                                To'g'ri ([[ score ]])
                            </button>
                            <button 
                                @click="reviewFilter = 'incorrect'"
                                class="px-4 py-2 rounded-lg transition-all text-red-600"
                                :class="reviewFilter === 'incorrect' ? 'bg-white shadow-sm font-bold' : 'text-red-500/70 hover:text-red-600'"
                            >
                                Xato ([[ questions.length - score ]])
                            </button>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div 
                            v-for="(q, idx) in filteredReviewQuestions" 
                            :key="q.id"
                            class="p-5 rounded-xl border flex flex-col gap-3"
                            :class="[
                                userAnswers[q.id] === q.correct_option_id
                                    ? 'bg-emerald-50/30 border-emerald-100 text-slate-800'
                                    : 'bg-red-50/30 border-red-100 text-slate-800'
                            ]"
                        >
                            <div class="flex items-center justify-between border-b pb-2" :class="userAnswers[q.id] === q.correct_option_id ? 'border-emerald-100/50' : 'border-red-100/50'">
                                <span class="font-bold text-sm">Savol [[ questions.indexOf(q) + 1 ]]</span>
                                <span 
                                    class="text-xs font-bold px-2 py-0.5 rounded"
                                    :class="[
                                        userAnswers[q.id] === undefined
                                            ? 'bg-red-100 text-red-700'
                                            : userAnswers[q.id] === q.correct_option_id 
                                                ? 'bg-emerald-100 text-emerald-700' 
                                                : 'bg-red-100 text-red-700'
                                    ]"
                                >
                                    [[ getAnswerStatusText(q, userAnswers[q.id]) ]]
                                </span>
                            </div>
                            
                            <!-- Question text -->
                            <p class="text-sm font-medium">[[ getTranslation(q, currentLang).question ]]</p>
                            
                            <!-- Options list showing user selection vs correct answer -->
                            <div class="space-y-1.5">
                                <div 
                                    v-for="opt in getTranslation(q, currentLang).options" 
                                    :key="opt.id"
                                    class="text-xs p-2 rounded flex items-center justify-between"
                                    :class="[
                                        opt.id === q.correct_option_id
                                            ? 'bg-emerald-100/60 text-emerald-800 font-bold'
                                            : userAnswers[q.id] === opt.id
                                                ? 'bg-red-100/60 text-red-800 font-bold'
                                                : 'bg-transparent text-gray-500'
                                    ]"
                                >
                                    <span>[[ opt.text ]]</span>
                                    <span v-if="opt.id === q.correct_option_id" class="text-[10px] uppercase font-bold tracking-wider">[To'g'ri javob]</span>
                                    <span v-else-if="userAnswers[q.id] === opt.id" class="text-[10px] uppercase font-bold tracking-wider">[Sizning javobingiz]</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </div> <!-- Right Main Content Area Close -->

            <!-- ==================== STUDENT MOBILE BOTTOM NAVIGATION ==================== -->
            <nav 
                v-if="!isTestStarted && (loggedInUserType === 'student' || (!isAdminMode && loggedInUserType === 'admin'))" 
                class="fixed bottom-0 left-0 right-0 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md border-t border-slate-200/80 dark:border-slate-800 py-2 px-6 flex justify-around items-center z-40 shadow-lg"
            >
                <!-- Bosh sahifa -->
                <button 
                    @click="activeStudentTab = 'dashboard'"
                    class="flex flex-col items-center gap-1 transition-all"
                    :class="activeStudentTab === 'dashboard' ? 'text-blue-600 dark:text-blue-400 font-black scale-105' : 'text-gray-400 hover:text-gray-600 font-medium'"
                >
                    <span class="text-xl">🏠</span>
                    <span class="text-[10px]">Bosh sahifa</span>
                </button>

                <!-- Saqlanganlar -->
                <button 
                    @click="activeStudentTab = 'saved'"
                    class="flex flex-col items-center gap-1 transition-all"
                    :class="activeStudentTab === 'saved' ? 'text-blue-600 dark:text-blue-400 font-black scale-105' : 'text-gray-400 hover:text-gray-600 font-medium'"
                >
                    <span class="text-xl">🔖</span>
                    <span class="text-[10px]">Saqlanganlar</span>
                </button>

                <!-- Kamera -->
                <button 
                    @click="openPhotoSourceModal"
                    class="flex flex-col items-center gap-1 transition-all text-gray-400 hover:text-blue-600 font-medium"
                >
                    <span class="text-xl">📷</span>
                    <span class="text-[10px]">Kamera</span>
                </button>

                <!-- Profil -->
                <button 
                    @click="activeStudentTab = 'profile'"
                    class="flex flex-col items-center gap-1 transition-all"
                    :class="activeStudentTab === 'profile' ? 'text-blue-600 dark:text-blue-400 font-black scale-105' : 'text-gray-400 hover:text-gray-600 font-medium'"
                >
                    <span class="text-xl">👤</span>
                    <span class="text-[10px]">Profil</span>
                </button>
            </nav>
        </main>
        </template>

        <!-- ==================== ADMIN PASSWORD VERIFICATION MODAL ==================== -->
        <div v-if="showAdminVerifyModal" class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="card-3d bg-white rounded-3xl w-full max-w-sm shadow-2xl flex flex-col p-6 border border-slate-200">
                <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-2xl mx-auto shadow-sm border border-amber-100 mb-4 animate-bounce">
                    🔒
                </div>
                <h3 class="text-base font-black text-slate-800 text-center tracking-tight uppercase mb-1">XAVFSIZLIK TEKSHIRUVI</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider text-center mb-6">// ADMIN PAROLINI TASDIQLANG</p>
                
                <form @submit.prevent="confirmAdminVerify" class="flex flex-col gap-4 text-left">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Admin Maxfiy Paroli</label>
                        <input 
                            type="password" 
                            v-model="adminVerifyPasswordInput" 
                            placeholder="Parolni kiriting..." 
                            class="p-3 rounded-xl border text-xs bg-slate-50 focus:bg-white text-slate-800 font-semibold focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                            required
                            autofocus
                        />
                    </div>
                    
                    <div v-if="adminVerifyError" class="p-3 bg-red-50 border border-red-100 rounded-xl text-red-600 text-[11px] font-bold text-center">
                        [[ adminVerifyError ]]
                    </div>
                    
                    <div class="flex gap-2 mt-2">
                        <button 
                            type="button"
                            @click="showAdminVerifyModal = false"
                            class="btn-3d w-1/2 py-2.5 bg-slate-100 text-slate-600 rounded-xl text-xs font-bold transition-all border-b-[3px] border-b-slate-300 hover:bg-slate-200"
                        >
                            BEKOR QILISH
                        </button>
                        <button 
                            type="submit"
                            class="btn-3d w-1/2 py-2.5 bg-amber-500 text-white rounded-xl text-xs font-extrabold shadow-md transition-all border-b-[3px] border-b-amber-700 hover:bg-amber-600"
                        >
                            TASDIQLASH
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ==================== ADD CUSTOM QUESTION MODAL ==================== -->
        <div v-if="showAddQuestionModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="card-3d bg-white rounded-3xl w-full max-w-lg shadow-2xl flex flex-col overflow-hidden max-h-[90vh]">
                <!-- Header -->
                <div class="p-5 border-b bg-emerald-50 border-emerald-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-inner font-extrabold text-lg">
                            ➕
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="text-sm font-black text-emerald-900 uppercase">Tizimga Yangi Savol Qo'shish</span>
                            <span class="text-[10px] font-mono text-emerald-600">// Ma'lumotlar bazasi va onlayn test uchun</span>
                        </div>
                    </div>
                    <button @click="showAddQuestionModal = false" class="w-8 h-8 rounded-full bg-emerald-100 hover:bg-emerald-200 text-emerald-700 flex items-center justify-center transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- Body Form -->
                <div class="p-6 space-y-4 overflow-y-auto max-h-[70vh]">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Savol matni (YHQ qoidasi bo'yicha):</label>
                        <textarea 
                            v-model="customQuestionText" 
                            rows="3"
                            placeholder="Masalan: Haydovchi qaysi hollarda o'z o'rnini tark etishi yoki transport vositasini qoldirishi mumkin?"
                            class="w-full p-3 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 outline-none text-slate-800"
                        ></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-emerald-700 mb-1">Variant A (To'g'ri javob ✅):</label>
                        <input 
                            type="text" 
                            v-model="customOptA" 
                            placeholder="To'g'ri javob variantini kiriting..."
                            class="w-full p-3 border border-emerald-300 bg-emerald-50/30 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 outline-none font-semibold text-emerald-900"
                        />
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Variant B (Noto'g'ri javob ❌):</label>
                        <input 
                            type="text" 
                            v-model="customOptB" 
                            placeholder="Noto'g'ri variant 1..."
                            class="w-full p-3 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 outline-none text-slate-800"
                        />
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">Variant C (Noto'g'ri javob ❌):</label>
                        <input 
                            type="text" 
                            v-model="customOptC" 
                            placeholder="Noto'g'ri variant 2..."
                            class="w-full p-3 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 outline-none text-slate-800"
                        />
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-amber-700 mb-1">Qoida tushuntirishi / Bilimni oshirish uchun izoh (Optional):</label>
                        <textarea 
                            v-model="customExplanation" 
                            rows="2"
                            placeholder="YHQ 12.4 bandiga asosan..."
                            class="w-full p-3 border border-amber-200 bg-amber-50/30 rounded-xl text-xs focus:ring-2 focus:ring-amber-500 outline-none text-slate-800"
                        ></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Qiyinchilik darajasi:</label>
                        <select v-model="customLevel" class="w-full p-3 border border-gray-200 rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 outline-none text-slate-800">
                            <option :value="1">1-Bosqich (Boshlang'ich)</option>
                            <option :value="2">2-Bosqich (O'rta)</option>
                            <option :value="3">3-Bosqich (Murakkab)</option>
                        </select>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-4 bg-gray-50 border-t flex items-center justify-end gap-3">
                    <button 
                        @click="showAddQuestionModal = false"
                        class="px-4 py-2.5 bg-gray-200 hover:bg-gray-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                    >
                        BEKOR QILISH
                    </button>
                    <button 
                        @click="handleSaveCustomQuestion"
                        :disabled="isSubmittingCustomQuestion"
                        class="btn-3d px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-black transition-all shadow-md shadow-emerald-500/20 border-b-[3px] border-b-emerald-800 disabled:opacity-50"
                    >
                        <span v-if="!isSubmittingCustomQuestion">💾 BAZAGA QO'SHISH VA SAQLASH</span>
                        <span v-else>SAQLANMOQDA...</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- ==================== MOBILE ACCESS QR CODE MODAL ==================== -->
        <div v-if="showMobileAccessModal" class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fadeIn">
            <div class="card-3d bg-white dark:bg-slate-800 rounded-3xl w-full max-w-md shadow-2xl flex flex-col p-6 border border-slate-200 dark:border-slate-700 text-center gap-4 animate-scaleUp">
                <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-700 pb-3">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl shadow-sm border border-blue-100">
                            📱
                        </div>
                        <div class="text-left">
                            <h3 class="text-sm font-black text-slate-800 dark:text-white uppercase tracking-tight">TELEFONDAN KIRISH</h3>
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">// QR-KODNI SKANERLANG</p>
                        </div>
                    </div>

                    <button 
                        @click="refreshMobileUrls" 
                        :disabled="isRefreshingMobileUrls"
                        class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 text-slate-700 dark:text-slate-200 rounded-xl text-[11px] font-bold transition-all flex items-center gap-1 shadow-sm"
                        title="Havola va QR-kodni yangilash"
                    >
                        <span>🔄</span>
                        <span v-if="!isRefreshingMobileUrls">Yangilash</span>
                        <span v-else>Tekshirilmoqda...</span>
                    </button>
                </div>

                <!-- Mode Selector (Online vs Wi-Fi) -->
                <div class="grid grid-cols-2 gap-2 p-1 bg-slate-100 dark:bg-slate-900/70 rounded-2xl border border-slate-200 dark:border-slate-700 text-xs font-bold">
                    <button 
                        @click="mobileAccessMode = 'online'"
                        class="py-2.5 rounded-xl transition-all flex items-center justify-center gap-1.5"
                        :class="mobileAccessMode === 'online' ? 'bg-[#0066cc] text-white shadow-md' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900'"
                    >
                        <span>🌐 Onlayn Internet</span>
                    </button>
                    <button 
                        @click="mobileAccessMode = 'wifi'"
                        class="py-2.5 rounded-xl transition-all flex items-center justify-center gap-1.5"
                        :class="mobileAccessMode === 'wifi' ? 'bg-emerald-600 text-white shadow-md' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900'"
                    >
                        <span>📶 Bitta Wi-Fi (Lokal)</span>
                    </button>
                </div>
                
                <!-- QR Code Box -->
                <div class="flex flex-col items-center justify-center p-4 bg-slate-50 dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-inner">
                    <img 
                        v-if="mobileAccessQrCodeUrl" 
                        :src="mobileAccessQrCodeUrl" 
                        alt="Mobile QR Code" 
                        class="w-52 h-52 rounded-xl shadow-md border-4 border-white bg-white p-2"
                    />
                    <div v-else class="w-52 h-52 flex items-center justify-center text-xs text-gray-400 font-bold">
                        QR-kod yuklanmoqda...
                    </div>
                </div>

                <!-- URL address display & Copy Button -->
                <div class="p-3 bg-blue-50/60 dark:bg-slate-900/80 border border-blue-100 dark:border-slate-700 rounded-2xl text-left flex items-center justify-between gap-2">
                    <div class="flex flex-col min-w-0">
                        <span class="text-[9px] font-mono text-gray-400 uppercase font-bold">// Ulanish manzili</span>
                        <span class="font-mono text-xs font-black text-blue-700 dark:text-blue-400 truncate">[[ currentMobileUrl ]]</span>
                    </div>
                    <button 
                        @click="copyMobileUrl" 
                        class="px-3 py-2 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white rounded-xl text-xs font-bold transition-all shrink-0 flex items-center gap-1 shadow-sm"
                        title="Nusxa olish"
                    >
                        📋 Nusxa
                    </button>
                </div>

                <!-- Instructions note -->
                <div class="text-[11px] font-medium leading-relaxed bg-slate-50 dark:bg-slate-900/60 p-3 rounded-2xl border border-slate-200 dark:border-slate-700 text-left text-slate-700 dark:text-slate-300">
                    <div v-if="mobileAccessMode === 'online'">
                        <strong class="text-blue-600 dark:text-blue-400 font-black">🌐 Onlayn rejim:</strong> Telefoningizda oddiy mobil internet (LTE/4G/5G) bo'lsa yetarli. Bitta Wi-Fi shart emas.
                    </div>
                    <div v-else>
                        <strong class="text-emerald-600 dark:text-emerald-400 font-black">📶 Wi-Fi rejim:</strong> Telefon va kompyuter bitta Wi-Fi routeriga ulangan bo'lsa, hech qanday internetsiz eng tezkor va barqaror ishlaydi!
                    </div>
                </div>

                <button 
                    @click="showMobileAccessModal = false"
                    class="w-full py-3 bg-slate-800 hover:bg-slate-900 dark:bg-blue-600 dark:hover:bg-blue-700 text-white rounded-2xl text-xs font-extrabold uppercase tracking-wider mt-1 transition-all shadow-md"
                >
                    Tushunarli (Yopish)
                </button>
            </div>
        </div>

        <!-- ==================== QR CODE CHECK-IN MODAL ==================== -->
        <div v-if="showQrModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[999] flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-3xl max-w-sm w-full flex flex-col items-center gap-4 shadow-2xl border border-slate-100 animate-scaleUp text-left">
                <h3 class="text-sm font-black text-slate-800 uppercase tracking-wider text-center">QR Davomat Check-In</h3>
                
                <div class="p-4 bg-white border border-slate-200 rounded-2xl shadow-inner mx-auto flex items-center justify-center">
                    <img 
                        :src="qrCodeUrl" 
                        alt="QR Code" 
                        class="w-48 h-48 rounded-xl shadow-sm border border-slate-100"
                    />
                </div>
                
                <span class="text-[10px] text-gray-400 font-mono font-bold text-center block w-full">STUDENT-ID: [[ currentStudent?.login ]]</span>
                
                <button 
                    @click="confirmQrAttendanceSim"
                    class="w-full py-3.5 bg-[#10b981] hover:bg-emerald-600 active:scale-95 text-white rounded-2xl text-xs font-black uppercase tracking-wider border-b-4 border-b-emerald-800 text-center"
                >
                    📲 Davomatni tasdiqlash
                </button>
                
                <button 
                    @click="showQrModal = false"
                    class="w-full py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-2xl text-xs font-bold uppercase tracking-wider text-center"
                >
                    Yopish
                </button>
            </div>
        </div>

        <!-- ==================== PHOTO SOURCE SELECTION & WEBCAM CAPTURE MODAL ==================== -->
        <div v-if="showPhotoSourceModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[999] flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-3xl max-w-sm w-full flex flex-col gap-4 shadow-2xl border border-slate-100/80 animate-scaleUp text-left">
                <div class="flex justify-between items-center border-b pb-2">
                    <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider">Profil rasmini o'rnatish</h3>
                    <button @click="closePhotoSourceModal" class="text-gray-400 hover:text-slate-600 font-bold">✕</button>
                </div>

                <!-- Option 1: Live camera capture panel -->
                <div v-if="isCameraActive" class="flex flex-col gap-3">
                    <div class="relative w-full aspect-square bg-black rounded-2xl overflow-hidden border border-slate-200 shadow-inner">
                        <!-- added muted to prevent browser autoplay block -->
                        <video id="webcam-preview" autoplay playsinline muted class="w-full h-full object-cover"></video>
                    </div>
                    <div class="flex flex-col gap-2">
                        <button 
                            @click="capturePhoto"
                            class="w-full py-3 bg-[#10b981] hover:bg-emerald-600 active:scale-95 text-white rounded-2xl font-black text-xs uppercase transition-all shadow-md shadow-emerald-500/10 border-b-4 border-b-emerald-800 text-center"
                        >
                            📸 Suratga tushish
                        </button>
                        <div class="flex gap-2">
                            <button 
                                @click="triggerNativeCamera"
                                class="flex-1 py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-xl font-bold text-[10px] uppercase transition-all text-center border"
                            >
                                📱 Mobil kamerani ochish
                            </button>
                            <button 
                                @click="stopWebcam"
                                class="py-2.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-[10px] uppercase transition-all text-center"
                            >
                                Orqaga
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Option 2: Choice Buttons -->
                <div v-else class="flex flex-col gap-2 py-2">
                    <!-- Desktop/Browser Webcam stream -->
                    <button 
                        @click="startWebcam"
                        class="w-full py-4 bg-blue-600 hover:bg-blue-700 active:scale-95 text-white rounded-2xl font-black text-xs uppercase transition-all shadow-md flex items-center justify-center gap-2 border-b-4 border-b-blue-800"
                    >
                        📷 Brauzer kamerasidan olish
                    </button>
                    <!-- Mobile system native camera fallback -->
                    <button 
                        @click="triggerNativeCamera"
                        class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-white rounded-2xl font-black text-xs uppercase transition-all shadow-md flex items-center justify-center gap-2 border-b-4 border-b-emerald-800"
                    >
                        📱 Telefon kamerasini ochish
                    </button>
                    <button 
                        @click="triggerPhotoUpload"
                        class="w-full py-4 bg-slate-100 hover:bg-slate-200 active:scale-95 text-slate-700 rounded-2xl font-black text-xs uppercase transition-all flex items-center justify-center gap-2 border-b-4 border-b-slate-300"
                    >
                        📁 Qurilmadan rasm yuklash
                    </button>
                </div>

                <!-- Hidden native camera input utilizing capture attribute -->
                <input 
                    type="file" 
                    accept="image/*" 
                    capture="user" 
                    id="student-native-camera-input" 
                    class="hidden" 
                    @change="uploadStudentPhoto" 
                />
            </div>
        </div>

        <!-- ==================== STUDENT PASSWORD CHANGE MODAL ==================== -->
        <div v-if="showChangePasswordModal" class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm animate-fadeIn">
            <div class="card-3d bg-white dark:bg-slate-800 rounded-3xl w-full max-w-sm shadow-2xl flex flex-col p-6 border border-slate-200 dark:border-slate-700 animate-scaleUp">
                <div class="w-12 h-12 bg-blue-50 dark:bg-blue-950 text-blue-600 dark:text-blue-400 rounded-2xl flex items-center justify-center text-2xl mx-auto shadow-sm mb-3">
                    🔒
                </div>
                <h3 class="text-base font-black text-slate-800 dark:text-white text-center tracking-tight uppercase mb-1">PAROLNI ALMASHTIRISH</h3>
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider text-center mb-5">// YANGI MAXFIY PAROLINGIZNI KIRITING</p>
                
                <form @submit.prevent="handleChangePassword" class="flex flex-col gap-3.5 text-left">
                    <div class="flex flex-col gap-1">
                        <label class="text-[10px] font-bold text-gray-500 uppercase">Yangi parol</label>
                        <input 
                            type="password" 
                            v-model="newPasswordInput" 
                            placeholder="Yangi parol..." 
                            class="p-3 rounded-xl border text-xs bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-white font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            required
                        />
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-[10px] font-bold text-gray-500 uppercase">Parolni tasdiqlang</label>
                        <input 
                            type="password" 
                            v-model="confirmPasswordInput" 
                            placeholder="Qayta kiriting..." 
                            class="p-3 rounded-xl border text-xs bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-white font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            required
                        />
                    </div>
                    
                    <div v-if="passwordChangeError" class="p-2.5 bg-red-50 dark:bg-red-950/60 border border-red-100 text-red-600 rounded-xl text-xs font-bold text-center">
                        [[ passwordChangeError ]]
                    </div>

                    <div v-if="passwordChangeSuccess" class="p-2.5 bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-100 text-emerald-600 rounded-xl text-xs font-bold text-center">
                        [[ passwordChangeSuccess ]]
                    </div>
                    
                    <div class="flex gap-2 mt-2">
                        <button 
                            type="button"
                            @click="showChangePasswordModal = false; passwordChangeError = ''; passwordChangeSuccess = '';"
                            class="w-1/2 py-2.5 bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-200 rounded-xl text-xs font-bold transition-all hover:bg-slate-200"
                        >
                            BEKOR QILISH
                        </button>
                        <button 
                            type="submit"
                            class="w-1/2 py-2.5 bg-blue-600 text-white rounded-xl text-xs font-bold transition-all hover:bg-blue-700 shadow-md"
                        >
                            SAQLASH
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ==================== EXPLANATION MODAL ==================== -->
        <div v-if="showExplanationModal" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="card-3d bg-white rounded-3xl w-full max-w-lg shadow-2xl flex flex-col overflow-hidden max-h-[90vh]">
                <!-- Header -->
                <div class="p-5 border-b bg-amber-50 border-amber-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center text-white shadow-inner font-extrabold text-lg">
                            💡
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="text-sm font-black text-amber-900 uppercase">Bilimni Oshirish & YHQ Izohi</span>
                            <span class="text-[10px] font-mono text-amber-600">// Yo'l Harakati Qoidalari bo'yicha tushuntirish</span>
                        </div>
                    </div>
                    <button @click="showExplanationModal = false" class="w-8 h-8 rounded-full bg-amber-100 hover:bg-amber-200 text-amber-800 flex items-center justify-center transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- Content -->
                <div class="p-6 space-y-4 overflow-y-auto max-h-[70vh]">
                    <div class="p-4 bg-blue-50 border border-blue-100 rounded-2xl">
                        <span class="text-xs font-bold text-blue-900 block mb-1">❓ Hozirgi Savol:</span>
                        <p class="text-xs text-blue-800 leading-relaxed font-semibold">[[ currentQuestionData.question ]]</p>
                    </div>

                    <div class="p-4 bg-amber-50/60 border border-amber-200/80 rounded-2xl space-y-2">
                        <span class="text-xs font-black text-amber-900 block flex items-center gap-1">
                            📖 YHQ Qoidasi va Rasmiy Izoh:
                        </span>
                        <p class="text-xs text-slate-700 leading-relaxed">
                            [[ currentQuestion.translations && currentQuestion.translations[currentLang] && currentQuestion.translations[currentLang].explanation ? currentQuestion.translations[currentLang].explanation : "O'zbekiston Respublikasi Yo'l Harakati Qoidalariga muvofiq, haydovchi o'z o'rnini tark etishi yoki transport vositasini qoldirishi oldidan uning o'z-o'zidan harakatlanib ketishi va undan haydovchisiz foydalanishning oldini oluvchi choralarni ko'rishi shart." ]]
                        </p>
                    </div>

                    <div class="p-3 bg-emerald-50 border border-emerald-100 rounded-xl text-center">
                        <span class="text-[11px] font-bold text-emerald-800">✅ To'g'ri javob: [[ getCorrectOptionText(currentQuestion) ]]</span>
                    </div>
                </div>

                <!-- Footer -->
                <div class="p-4 bg-gray-50 border-t flex justify-end">
                    <button 
                        @click="showExplanationModal = false"
                        class="px-5 py-2 bg-[#0066cc] text-white font-extrabold text-xs rounded-xl shadow-md hover:bg-blue-600 transition-all"
                    >
                        TUSHUNDIM (YOPISH)
                    </button>
                </div>
            </div>
        </div>

        <!-- ==================== SCHOOL PAYMENT CHAT MODAL ==================== -->
        <div v-if="showPaymentChat" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="card-3d bg-white rounded-3xl w-full max-w-lg shadow-2xl flex flex-col overflow-hidden max-h-[90vh]">
                <!-- Header -->
                <div class="p-4 border-b bg-emerald-50 border-emerald-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="relative w-10 h-10 rounded-full bg-emerald-600 flex items-center justify-center text-white shadow-inner font-extrabold text-sm">
                            💵
                            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-400 border-2 border-white rounded-full animate-pulse"></span>
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-black text-emerald-800 tracking-tight uppercase">Avtotest Pay Assistant</span>
                            <span class="text-[9px] font-mono text-emerald-600 uppercase">// To'lovlar bo'yicha yordamchi bot</span>
                        </div>
                    </div>
                    <button @click="showPaymentChat = false" class="w-8 h-8 rounded-full bg-emerald-100 hover:bg-emerald-200 text-emerald-700 flex items-center justify-center transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- Chat Messages Body -->
                <div id="chat-body" class="flex-grow overflow-y-auto p-4 space-y-4 bg-slate-50 min-h-[300px] max-h-[450px] flex flex-col">
                    <div v-for="(msg, idx) in chatMessages" :key="idx" class="flex flex-col" :class="msg.sender === 'user' ? 'items-end' : 'items-start'">
                        <span class="text-[9px] font-mono text-gray-400 mb-1 uppercase">[[ msg.sender === 'user' ? 'Siz' : 'Pay Bot' ]]</span>
                        <div 
                            class="p-3 text-xs leading-relaxed shadow-sm max-w-[85%]" 
                            :class="msg.sender === 'user' 
                                ? 'bg-[#0066cc] text-white rounded-2xl rounded-tr-none' 
                                : 'bg-white text-slate-800 rounded-2xl rounded-tl-none border border-gray-200/60'"
                        >
                            [[ msg.text ]]
                        </div>
                        
                        <!-- Embedded actions in Bot messages -->
                        <div v-if="msg.sender === 'bot' && idx === chatMessages.length - 1" class="mt-3 w-full">
                            <!-- Step 1: Select Student -->
                            <div v-if="msg.type === 'select_student'" class="grid grid-cols-1 gap-2 max-w-[90%]">
                                <button 
                                    v-for="s in studentsList" 
                                    :key="s.id"
                                    @click="handleSelectStudentInChat(s.id)"
                                    class="w-full text-left p-3 rounded-xl border text-xs bg-white hover:bg-slate-100/80 transition-all font-semibold flex justify-between items-center"
                                >
                                    <span>🎓 [[ s.name ]] ([[ s.class_name ]])</span>
                                    <span class="px-2 py-0.5 rounded text-[9px] font-bold" :class="s.tuition_status === 'To\'lagan' ? 'bg-emerald-50 text-emerald-600' : 'bg-amber-50 text-amber-600'">
                                        [[ s.tuition_status ]]
                                    </span>
                                </button>
                            </div>

                            <!-- Step 2: Select Amount -->
                            <div v-else-if="msg.type === 'select_amount'" class="flex flex-col gap-2">
                                <div class="flex flex-wrap gap-2">
                                    <button 
                                        @click="handleSelectAmountInChat(800000)"
                                        class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                    >
                                        💵 800 000 UZS (Standart)
                                    </button>
                                    <button 
                                        @click="chatCustomAmountInput = true"
                                        class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                                    >
                                        ✏️ Boshqa miqdor
                                    </button>
                                </div>
                                
                                <div v-if="chatCustomAmountInput" class="w-full mt-2 flex gap-2">
                                    <input 
                                        type="number" 
                                        v-model.number="chatCustomAmountVal"
                                        placeholder="Miqdorni kiriting (UZS)" 
                                        class="flex-grow p-2 border rounded-xl text-xs bg-white"
                                    />
                                    <button 
                                        @click="handleCustomAmountInChat(chatCustomAmountVal)"
                                        class="px-3 py-2 bg-[#0066cc] text-white rounded-xl text-xs font-bold"
                                    >
                                        Yuborish
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Select Payment Method -->
                            <div v-else-if="msg.type === 'select_method'" class="flex flex-wrap gap-2">
                                <button 
                                    @click="handleSelectMethodInChat('Naqd pul')"
                                    class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    💵 Naqd (Cash)
                                </button>
                                <button 
                                    @click="handleSelectMethodInChat('Plastik karta')"
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    💳 Plastik Karta
                                </button>
                                <button 
                                    @click="handleSelectMethodInChat('Bank o\'tkazmasi')"
                                    class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    🏦 Bank O'tkazmasi
                                </button>
                            </div>

                            <!-- Step 4: Confirm -->
                            <div v-else-if="msg.type === 'confirm'" class="max-w-[90%]">
                                <button 
                                    @click="handleConfirmPaymentInChat"
                                    class="w-full p-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-black uppercase transition-all shadow-md text-center"
                                >
                                    ✅ TO'LOVNI QABUL QILISH VA TASDIQLASH
                                </button>
                            </div>

                            <!-- Step 5: Success / Close -->
                            <div v-else-if="msg.type === 'success'" class="flex gap-2">
                                <button 
                                    @click="showPaymentChat = false"
                                    class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs font-bold transition-all"
                                >
                                    ❌ Chati yopish
                                </button>
                                <button 
                                    @click="openPaymentChat"
                                    class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all"
                                >
                                    ➕ Yangi to'lov
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Typing indicator -->
                    <div v-if="isChatTyping" class="flex items-center gap-2 text-xs text-gray-400 italic">
                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-bounce"></span>
                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-bounce" style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-bounce" style="animation-delay: 0.4s"></span>
                        <span>Pay Bot yozmoqda...</span>
                    </div>
                </div>

                <!-- Footer decorative area -->
                <div class="p-3 bg-gray-100 border-t flex items-center justify-between text-[10px] text-gray-400 font-mono">
                    <span>💡 Dialog tugmalaridan birini tanlang</span>
                    <span>AVTOTEST PAY BOT v1.0</span>
                </div>
            </div>
        </div>

        <!-- ==================== SCHOOL EXPENSE CHAT MODAL ==================== -->
        <div v-if="showExpenseChat" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="card-3d bg-white rounded-3xl w-full max-w-lg shadow-2xl flex flex-col overflow-hidden max-h-[90vh]">
                <!-- Header -->
                <div class="p-4 border-b bg-rose-50 border-rose-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="relative w-10 h-10 rounded-full bg-rose-600 flex items-center justify-center text-white shadow-inner font-extrabold text-sm">
                            📉
                            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-rose-400 border-2 border-white rounded-full animate-pulse"></span>
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-black text-rose-800 tracking-tight uppercase">Avtotest Expense Assistant</span>
                            <span class="text-[9px] font-mono text-rose-600 uppercase">// Chiqimlar va tahlillar bot yordamchisi</span>
                        </div>
                    </div>
                    <button @click="showExpenseChat = false" class="w-8 h-8 rounded-full bg-rose-100 hover:bg-rose-200 text-rose-700 flex items-center justify-center transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- Chat Messages Body -->
                <div id="expense-chat-body" class="flex-grow overflow-y-auto p-4 space-y-4 bg-slate-50 min-h-[300px] max-h-[450px] flex flex-col">
                    <div v-for="(msg, idx) in expenseChatMessages" :key="idx" class="flex flex-col" :class="msg.sender === 'user' ? 'items-end' : 'items-start'">
                        <span class="text-[9px] font-mono text-gray-400 mb-1 uppercase">[[ msg.sender === 'user' ? 'Siz' : 'Expense Bot' ]]</span>
                        <div 
                            class="p-3 text-xs leading-relaxed shadow-sm max-w-[85%] whitespace-pre-line text-left" 
                            :class="msg.sender === 'user' 
                                ? 'bg-rose-600 text-white rounded-2xl rounded-tr-none' 
                                : 'bg-white text-slate-800 rounded-2xl rounded-tl-none border border-gray-200/60'"
                        >
                            [[ msg.text ]]
                        </div>
                        
                        <!-- Embedded actions in Bot messages -->
                        <div v-if="msg.sender === 'bot' && idx === expenseChatMessages.length - 1" class="mt-3 w-full">
                            <!-- Step 1: Start / Report or Add -->
                            <div v-if="msg.type === 'start'" class="flex flex-wrap gap-2">
                                <button 
                                    @click="handleViewReportInChat"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    📊 Chiqimlar hisoboti (Tahlil)
                                </button>
                                <button 
                                    @click="handleStartNewExpenseInChat"
                                    class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    ➕ Yangi chiqim yozish
                                </button>
                            </div>

                            <!-- Report Options: close or go back -->
                            <div v-else-if="msg.type === 'report_options'" class="flex gap-2">
                                <button 
                                    @click="showExpenseChat = false"
                                    class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs font-bold transition-all"
                                >
                                    ❌ Oynani yopish
                                </button>
                                <button 
                                    @click="handleStartNewExpenseInChat"
                                    class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all"
                                >
                                    ➕ Yangi chiqim kiritish
                                </button>
                            </div>

                            <!-- Step 2: Select Category -->
                            <div v-else-if="msg.type === 'select_category'" class="flex flex-col gap-2">
                                <div class="flex flex-wrap gap-2">
                                    <button 
                                        @click="handleSelectCategoryInChat('Ofis ijarasi')"
                                        class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                                    >
                                        🏢 Ofis ijarasi
                                    </button>
                                    <button 
                                        @click="handleSelectCategoryInChat('Kommunal to\'lovlar')"
                                        class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                                    >
                                        ⚡️ Kommunal xizmatlar
                                    </button>
                                    <button 
                                        @click="handleSelectCategoryInChat('Reklama xarajatlari')"
                                        class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                                    >
                                        📢 Reklama & Marketing
                                    </button>
                                    <button 
                                        @click="chatCustomCategoryInput = true"
                                        class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold transition-all"
                                    >
                                        ✏️ Boshqa sabab...
                                    </button>
                                </div>

                                <div v-if="chatCustomCategoryInput" class="w-full mt-2 flex gap-2">
                                    <input 
                                        type="text" 
                                        v-model="chatCustomCategoryVal"
                                        placeholder="Chiqim sababini yozing..." 
                                        class="flex-grow p-2 border rounded-xl text-xs bg-white"
                                    />
                                    <button 
                                        @click="handleCustomCategoryInChat(chatCustomCategoryVal)"
                                        class="px-3 py-2 bg-rose-600 text-white rounded-xl text-xs font-bold"
                                    >
                                        Kiritish
                                    </button>
                                </div>
                            </div>

                            <!-- Step 3: Select Amount -->
                            <div v-else-if="msg.type === 'select_amount'" class="flex flex-col gap-2">
                                <div class="flex flex-wrap gap-2">
                                    <button 
                                        @click="handleSelectExpenseAmountInChat(500000)"
                                        class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                    >
                                        💵 500 000 UZS
                                    </button>
                                    <button 
                                        @click="handleSelectExpenseAmountInChat(1000000)"
                                        class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                    >
                                        💵 1 000 000 UZS
                                    </button>
                                    <button 
                                        @click="chatCustomExpenseInput = true"
                                        class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                                    >
                                        ✏️ Boshqa miqdor
                                    </button>
                                </div>
                                
                                <div v-if="chatCustomExpenseInput" class="w-full mt-2 flex gap-2">
                                    <input 
                                        type="number" 
                                        v-model.number="chatCustomExpenseVal"
                                        placeholder="Miqdorni kiriting (UZS)" 
                                        class="flex-grow p-2 border rounded-xl text-xs bg-white"
                                    />
                                    <button 
                                        @click="handleCustomExpenseAmountInChat(chatCustomExpenseVal)"
                                        class="px-3 py-2 bg-[#0066cc] text-white rounded-xl text-xs font-bold"
                                    >
                                        Yuborish
                                    </button>
                                </div>
                            </div>

                            <!-- Step 4: Select Method -->
                            <div v-else-if="msg.type === 'select_method'" class="flex flex-wrap gap-2">
                                <button 
                                    @click="handleSelectExpenseMethodInChat('Naqd pul')"
                                    class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    💵 Naqd (Cash)
                                </button>
                                <button 
                                    @click="handleSelectExpenseMethodInChat('Plastik karta')"
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    💳 Plastik Karta
                                </button>
                                <button 
                                    @click="handleSelectExpenseMethodInChat('Bank o\'tkazmasi')"
                                    class="px-4 py-2 bg-purple-500 hover:bg-purple-600 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    🏦 Bank O'tkazmasi
                                </button>
                            </div>

                            <!-- Step 5: Confirm -->
                            <div v-else-if="msg.type === 'confirm'" class="max-w-[90%]">
                                <button 
                                    @click="handleConfirmExpenseInChat"
                                    class="w-full p-3 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-black uppercase transition-all shadow-md text-center"
                                >
                                    ✅ CHIQIMNI QABUL QILISH VA HISOBLASH
                                </button>
                            </div>

                            <!-- Step 6: Success / Close -->
                            <div v-else-if="msg.type === 'success'" class="flex gap-2">
                                <button 
                                    @click="showExpenseChat = false"
                                    class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs font-bold transition-all"
                                >
                                    ❌ Chati yopish
                                </button>
                                <button 
                                    @click="openExpenseChat"
                                    class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all"
                                >
                                    ➕ Yangi chiqim
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Typing indicator -->
                    <div v-if="isExpenseChatTyping" class="flex items-center gap-2 text-xs text-gray-400 italic">
                        <span class="w-2 h-2 rounded-full bg-rose-600 animate-bounce"></span>
                        <span class="w-2 h-2 rounded-full bg-rose-600 animate-bounce" style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 rounded-full bg-rose-600 animate-bounce" style="animation-delay: 0.4s"></span>
                        <span>Expense Bot yozmoqda...</span>
                    </div>
                </div>

                <!-- Footer decorative area -->
                <div class="p-3 bg-gray-100 border-t flex items-center justify-between text-[10px] text-gray-400 font-mono">
                    <span>💡 Dialog tugmalaridan birini tanlang</span>
                    <span>AVTOTEST EXPENSE BOT v1.0</span>
                </div>
            </div>
        </div>

        <!-- ==================== SCHOOL PROFIT CHAT MODAL ==================== -->
        <div v-if="showProfitChat" class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm">
            <div class="card-3d bg-white rounded-3xl w-full max-w-lg shadow-2xl flex flex-col overflow-hidden max-h-[90vh]">
                <!-- Header -->
                <div class="p-4 border-b bg-blue-50 border-blue-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="relative w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white shadow-inner font-extrabold text-sm">
                            ⚖️
                            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-blue-400 border-2 border-white rounded-full animate-pulse"></span>
                        </div>
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-black text-blue-800 tracking-tight uppercase">Avtotest Profit Analyzer</span>
                            <span class="text-[9px] font-mono text-blue-600 uppercase">// Sof foyda tahlili va yordamchisi</span>
                        </div>
                    </div>
                    <button @click="showProfitChat = false" class="w-8 h-8 rounded-full bg-blue-100 hover:bg-blue-200 text-blue-700 flex items-center justify-center transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- Chat Messages Body -->
                <div id="profit-chat-body" class="flex-grow overflow-y-auto p-4 space-y-4 bg-slate-50 min-h-[300px] max-h-[450px] flex flex-col">
                    <div v-for="(msg, idx) in profitChatMessages" :key="idx" class="flex flex-col" :class="msg.sender === 'user' ? 'items-end' : 'items-start'">
                        <span class="text-[9px] font-mono text-gray-400 mb-1 uppercase">[[ msg.sender === 'user' ? 'Siz' : 'Profit Bot' ]]</span>
                        <div 
                            class="p-3 text-xs leading-relaxed shadow-sm max-w-[85%] whitespace-pre-line text-left" 
                            :class="msg.sender === 'user' 
                                ? 'bg-blue-600 text-white rounded-2xl rounded-tr-none' 
                                : 'bg-white text-slate-800 rounded-2xl rounded-tl-none border border-gray-200/60'"
                        >
                            [[ msg.text ]]
                        </div>
                        
                        <!-- Embedded actions in Bot messages -->
                        <div v-if="msg.sender === 'bot' && idx === profitChatMessages.length - 1" class="mt-3 w-full">
                            <!-- Step 1: Options -->
                            <div v-if="msg.type === 'start' || msg.type === 'options'" class="flex flex-wrap gap-2">
                                <button 
                                    @click="handleViewProfitAnalysis"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    📊 Moliyaviy tahlil
                                </button>
                                <button 
                                    @click="handleViewProfitTips"
                                    class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all shadow-sm"
                                >
                                    💡 Foydani oshirish tavsiyalari
                                </button>
                                <button 
                                    @click="handleViewFormulaHelp"
                                    class="px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all"
                                >
                                    ❓ Formula tushuntirish
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Typing indicator -->
                    <div v-if="isProfitChatTyping" class="flex items-center gap-2 text-xs text-gray-400 italic">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-bounce"></span>
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-bounce" style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-bounce" style="animation-delay: 0.4s"></span>
                        <span>Profit Bot yozmoqda...</span>
                    </div>
                </div>

                <!-- Footer decorative area -->
                <div class="p-3 bg-gray-100 border-t flex items-center justify-between text-[10px] text-gray-400 font-mono">
                    <span>💡 Dialog tugmalaridan birini tanlang</span>
                    <span>AVTOTEST PROFIT BOT v1.0</span>
                </div>
            </div>
        </div>

        <!-- ==================== FOOTER ==================== -->
        <footer v-if="loggedInUserType !== 'student' && !isTestStarted" class="bg-white dark:bg-slate-900 border-t border-gray-200/80 dark:border-slate-800 py-4 px-6 font-mono text-[10px] text-gray-400 shadow-inner">
            <div class="max-w-full mx-auto flex flex-col md:flex-row justify-between items-center gap-2 px-2 md:px-4">
                <div>
                    TAYYORLANGAN PLATFORMA: <span class="text-[#0066cc] font-bold">DELTA_AVTOMAKTAB_UZ</span> // IMTIHON SHABLONI
                </div>
                <div>
                    DELTA_AVTOMAKTAB_UZ © 2026 // BARCHA HUQUQLAR HIMOYA QILINGAN
                </div>
            </div>
        </footer>

    </div>

    <!-- Script Application -->
    <script>
        const { createApp, ref, onMounted, onUnmounted, computed, watch, nextTick } = Vue;

        createApp({
            setup() {
                const questions = ref([]);
                const adminQuestionsList = ref([]);
                const adminQuestionsCount = ref(0);
                const currentLevel = ref(1);
                const currentQuestionIndex = ref(0);
                const currentLang = ref('uz_lat');
                const userAnswers = ref({});
                const loading = ref(true);
                const reviewFilter = ref('all');
                const isTestStarted = ref(false);

                // Admin Panel state and mock data
                const uiDict = {
                    uz_lat: {
                        exam_title: "DELTA_AVTOMAKTAB_UZ IMTIHONI",
                        level_1: "1-Bosqich: Boshlang'ich",
                        level_2: "2-Bosqich: Murakkab (Qiyin)",
                        welcome_text: "Hurmatli haydovchilikka nomzod! Avtotest imtihon topshirish rejimiga xush kelibsiz. Imtihon davomiyligi <strong>25 daqiqa</strong> bo'lib, jami <strong>20 ta savol</strong> beriladi. Keyingi bosqichga o'tish uchun imtihondan <strong>20/20 ball</strong> bilan o'tishingiz talab etiladi.",
                        start_btn: "🚀 TEST TOPSHIRISHNI BOSHLAYMIZ",
                        admin_btn: "⚙️ Admin paneliga kirish",
                        tts_correct_prefix: "Barakalla, to'g'ri topdingiz!",
                        tts_correct_mid: "degan savolga rostdan ham",
                        tts_correct_end: "deb to'g'ri javob berdingiz.",
                        tts_wrong_prefix: "Afsuski, xato qildingiz.",
                        tts_wrong_mid: "degan savolga to'g'ri javob",
                        tts_wrong_end: "bo'lishi kerak edi.",
                        tts_prohibited_reason: "Bu amaliyot xavfsizlik nuqtai nazaridan taqiqlanadi.",
                        tts_prohibited_explanation: "Yo'l harakati xavfsizligini saqlash, avtohalokat oldini olish va boshqa haydovchilarni himoya qilish uchun bu harakat taqiqlanadi.",
                        panel_correct: "✅ To'g'ri javob!",
                        panel_wrong: "✅ To'g'ri javob:",
                        // Student Dashboard translations
                        student_title: "O'QUVCHI",
                        attendance_stats: "Davomat statistikasi",
                        start_date: "BOSHLANISH SANASI",
                        end_date: "TUGASH SANASI",
                        qr_attendance: "QR DAVOMAT",
                        sections: "BO'LIMLAR",
                        lessons: "Darslar",
                        tests: "Testlar",
                        schedule: "Dars jadvali",
                        attendance: "Davomatlar",
                        penalties: "Jarimalar",
                        dars: "dars",
                        ishtirok: "ishtirok",
                        qoldirilgan: "qoldirilgan",
                        back_to_dashboard: "➔ Bosh sahifaga qaytish",
                        attendance_history: "DAVOMAT TARIXI",
                        activity_history: "TIZIMGA KIRISH/CHIQISH TARIXI",
                        login_time: "Kirgan vaqti",
                        logout_time: "Chiqib ketgan vaqti",
                        currently_active: "Ayni vaqtda faol",
                        no_activity_history: "Hozircha kirish/chiqish tarixi mavjud emas",
                        no_attendance_history: "Hozircha davomat tarixi mavjud emas",
                        penalties_status: "JARIMALAR STATUSI",
                        no_penalties: "Sizda joriy jarimalar mavjud emas!",
                        no_penalties_desc: "Delta Avtomaktabi qoidalariga rioya qiling hamda xavfsiz haydash ko'nikmalarini egallang.",
                        pay_penalty: "💳 Jarimani to'lash",
                        confirm_attendance: "📲 Davomatni tasdiqlash",
                        close: "Yopish",
                        date: "Sana",
                        amount: "Miqdori",
                        topic: "Mavzu",
                        status: "Status"
                    },
                    en: {
                        exam_title: "DELTA_AVTOMAKTAB_UZ EXAM",
                        level_1: "Level 1: Beginner",
                        level_2: "Level 2: Advanced (Hard)",
                        welcome_text: "Dear driver candidate! Welcome to the Avtotest examination mode. The exam duration is <strong>25 minutes</strong>, and a total of <strong>20 questions</strong> will be asked. To pass to the next level, you are required to score <strong>20/20 points</strong>.",
                        start_btn: "🚀 START THE EXAM",
                        admin_btn: "⚙️ Enter Admin Panel",
                        tts_correct_prefix: "Excellent, you got it right!",
                        tts_correct_mid: "is indeed correctly answered as",
                        tts_correct_end: ".",
                        tts_wrong_prefix: "Unfortunately, that is incorrect.",
                        tts_wrong_mid: "the correct answer to the question",
                        tts_wrong_end: "is actually this one.",
                        tts_prohibited_reason: "This action is prohibited for safety reasons.",
                        tts_prohibited_explanation: "It is prohibited to maintain road safety, prevent accidents, and protect other drivers.",
                        panel_correct: "✅ Correct answer!",
                        panel_wrong: "✅ Correct answer:",
                        // Student Dashboard translations
                        student_title: "STUDENT",
                        attendance_stats: "Attendance statistics",
                        start_date: "START DATE",
                        end_date: "END DATE",
                        qr_attendance: "QR ATTENDANCE",
                        sections: "SECTIONS",
                        lessons: "Lessons",
                        tests: "Tests",
                        schedule: "Schedule",
                        attendance: "Attendance",
                        penalties: "Penalties",
                        dars: "lessons",
                        ishtirok: "present",
                        qoldirilgan: "absent",
                        back_to_dashboard: "➔ Back to Dashboard",
                        attendance_history: "ATTENDANCE HISTORY",
                        activity_history: "SYSTEM LOGIN/LOGOUT HISTORY",
                        login_time: "Login time",
                        logout_time: "Logout time",
                        currently_active: "Currently active",
                        no_activity_history: "No login/logout history yet",
                        no_attendance_history: "No attendance history yet",
                        penalties_status: "PENALTIES STATUS",
                        no_penalties: "You have no active penalties!",
                        no_penalties_desc: "Follow the rules of Delta Driving School and acquire safe driving skills.",
                        pay_penalty: "💳 Pay Penalty",
                        confirm_attendance: "📲 Confirm Attendance",
                        close: "Close",
                        date: "Date",
                        amount: "Amount",
                        topic: "Topic",
                        status: "Status"
                    },
                    ru: {
                        exam_title: "ЭКЗАМЕН DELTA_AVTOMAKTAB_UZ",
                        level_1: "Этап 1: Начальный",
                        level_2: "Этап 2: Сложный",
                        welcome_text: "Уважаемый кандидат в водители! Добро пожаловать в режим сдачи экзамена Автотест. Продолжительность экзамена составляет <strong>25 минут</strong>, всего будет задано <strong>20 вопросов</strong>. Для перехода на следующий этап необходимо сдать экзамен с результатом <strong>20/20 баллов</strong>.",
                        start_btn: "🚀 НАЧАТЬ ТЕСТИРОВАНИЕ",
                        admin_btn: "⚙️ Вход в панель администратора",
                        tts_correct_prefix: "Отлично, вы ответили правильно!",
                        tts_correct_mid: "на этот вопрос верный ответ действительно",
                        tts_correct_end: ".",
                        tts_wrong_prefix: "К сожалению, вы ошиблись.",
                        tts_wrong_mid: "правильный ответ на вопрос",
                        tts_wrong_end: "должен быть таким.",
                        panel_correct: "✅ Правильный ответ!",
                        panel_wrong: "✅ Правильный ответ:",
                        // Student Dashboard translations
                        student_title: "УЧЕНИК",
                        attendance_stats: "Статистика посещаемости",
                        start_date: "ДАТА НАЧАЛА",
                        end_date: "ДАТА ОКОНЧАНИЯ",
                        qr_attendance: "QR ПОСЕЩАЕМОСТЬ",
                        sections: "РАЗДЕЛЫ",
                        lessons: "Занятия",
                        tests: "Тесты",
                        schedule: "Расписание",
                        attendance: "Посещаемость",
                        penalties: "Штрафы",
                        dars: "занятий",
                        ishtirok: "посетил",
                        qoldirilgan: "пропустил",
                        back_to_dashboard: "➔ Вернуться на главную",
                        attendance_history: "ИСТОРИЯ ПОСЕЩАЕМОСТИ",
                        activity_history: "ИСТОРИЯ ВХОДОВ И ВЫХОДОВ",
                        login_time: "Время входа",
                        logout_time: "Время выхода",
                        currently_active: "Активен сейчас",
                        no_activity_history: "История входов/выходов отсутствует",
                        no_attendance_history: "История посещаемости отсутствует",
                        penalties_status: "СТАТУС ШТРАФОВ",
                        no_penalties: "У вас нет активных штрафов!",
                        no_penalties_desc: "Соблюдайте правила автошколы Delta и приобретайте навыки безопасного вождения.",
                        pay_penalty: "💳 Оплатить штраф",
                        confirm_attendance: "📲 Подтвердить присутствие",
                        close: "Закрыть",
                        date: "Дата",
                        amount: "Сумма",
                        topic: "Тема",
                        status: "Статус"
                    },
                    qr: {
                        exam_title: "DELTA_AVTOMAKTAB_UZ IMTIXANÍ",
                        level_1: "1-Basqısh: Baslanǵısh",
                        level_2: "2-Basqısh: Quramalı (Qıyın)",
                        welcome_text: "Húrmetli haydawshılıqqa talaban! Avtotest imtixan tapsırıw rejimine xosh kelipsiz. Imtixan dawamlılıǵı <strong>25 minut</strong> bolıp, jámi <strong>20 soraw</strong> beriledi. Keyingi basqıshqa ótiw ushın imtixannan <strong>20/20 ball</strong> menen ótiwińiz talap etiledi.",
                        start_btn: "🚀 TEST TAPSÍRÍWDÍ BASLAYMÍZ",
                        admin_btn: "⚙️ Admin paneline kiriw",
                        tts_correct_prefix: "Bárekella, durıs taptıńız!",
                        tts_correct_mid: "degen sorawǵa shınında da",
                        tts_correct_end: "dep durıs juwap berdińiz.",
                        tts_wrong_prefix: "Ókinishke qaray, qáte qıldıńız.",
                        tts_wrong_mid: "degen sorawǵa aslı durıs juwap",
                        tts_wrong_end: "bolıwı kerek edi.",
                        panel_correct: "✅ Durıs juwap!",
                        panel_wrong: "✅ Durıs juwap:",
                        // Student Dashboard translations
                        student_title: "OQÚWShÍ",
                        attendance_stats: "Davomat statistikası",
                        start_date: "BASLANǴÍSh SANASÍ",
                        end_date: "TAÚSÍLÍW SANASÍ",
                        qr_attendance: "QR DAVOMAT",
                        sections: "BÓLİMLER",
                        lessons: "Sabaqlar",
                        tests: "Testler",
                        schedule: "Sabaq kestesi",
                        attendance: "Davomatlar",
                        penalties: "Jarimalar",
                        dars: "sabaq",
                        ishtirok: "qatnastı",
                        qoldirilgan: "qaldırdı",
                        back_to_dashboard: "➔ Bas betke qaytıw",
                        attendance_history: "DAVOMAT TARIXI",
                        activity_history: "SİSTEMAǴA KİRİW/ShÍǴÍW TARIXI",
                        login_time: "Kiriw waqtı",
                        logout_time: "Shıǵıw waqtı",
                        currently_active: "Házirgi waqıtta belsendi",
                        no_activity_history: "Házirshe kiriw/shıǵıw tariyxı joq",
                        no_attendance_history: "Házirshe davomat tariyxı joq",
                        penalties_status: "JARIMALAR STATUSI",
                        no_penalties: "Sizde jazalar joq!",
                        no_penalties_desc: "Delta Avtomaktabı qádelerine boysınıń hám qáwipsiz aydaw kónlikpelerin iyeleń.",
                        pay_penalty: "💳 Jazanı tólew",
                        confirm_attendance: "📲 Davomattı tastıyıqlaw",
                        close: "Jabıw",
                        date: "Sana",
                        amount: "Muǵdarı",
                        topic: "Tema",
                        status: "Status"
                    }
                };
                    const t = (key) => {
                    return uiDict[currentLang.value] && uiDict[currentLang.value][key] ? uiDict[currentLang.value][key] : key;
                };
                const tStatus = (status) => {
                    if (status === 'Keldi') {
                        return currentLang.value === 'uz_lat' ? 'Keldi' : currentLang.value === 'en' ? 'Present' : currentLang.value === 'ru' ? 'Присутствовал' : 'Qatnastı';
                    } else {
                        return currentLang.value === 'uz_lat' ? 'Kelmadi' : currentLang.value === 'en' ? 'Absent' : currentLang.value === 'ru' ? 'Отсутствовал' : 'Qaldırdı';
                    }
                };

                const studentEndDate = (student) => {
                    if (!student || !student.subscription_end_date) return '07.10.2026';
                    try {
                        const dateParts = student.subscription_end_date.split('-');
                        if (dateParts.length === 3) {
                            return `${dateParts[2]}.${dateParts[1]}.${dateParts[0]}`;
                        }
                    } catch (e) {}
                    return student.subscription_end_date;
                };

                const studentStartDate = (student) => {
                    if (!student || !student.subscription_end_date) return '20.07.2026';
                    try {
                        const dateParts = student.subscription_end_date.split('-');
                        if (dateParts.length === 3) {
                            const year = parseInt(dateParts[0]);
                            const month = parseInt(dateParts[1]);
                            const day = parseInt(dateParts[2]);
                            
                            let startMonth = month - 3;
                            let startYear = year;
                            if (startMonth <= 0) {
                                startMonth += 12;
                                startYear -= 1;
                            }
                            
                            // Cap start day to maximum days of target month (e.g. Sept 31 -> Sept 30)
                            const maxDays = new Date(startYear, startMonth, 0).getDate();
                            const startDay = Math.min(day, maxDays);
                            
                            const dayStr = startDay < 10 ? '0' + startDay : startDay;
                            const monthStr = startMonth < 10 ? '0' + startMonth : startMonth;
                            return `${dayStr}.${monthStr}.${startYear}`;
                        }
                    } catch (e) {}
                    return '20.07.2026';
                };

                const isDarkMode = ref(localStorage.getItem('theme-dark') === 'true');
                watch(isDarkMode, (newVal) => {
                    localStorage.setItem('theme-dark', newVal);
                    if (newVal) {
                        document.documentElement.classList.add('dark-theme');
                    } else {
                        document.documentElement.classList.remove('dark-theme');
                    }
                }, { immediate: true });

                const isAdminMode = ref(false);
                const selectedStudentId = ref(null);
                const isLoggedIn = ref(false);
                const loggedInUserType = ref('');
                const loggedInStudentId = ref(null);
                const authUsername = ref('');
                const authPassword = ref('');
                const authError = ref('');
                
                const adminUsernameSetting = ref(localStorage.getItem('admin_user') || 'admin');
                const adminPasswordSetting = ref(localStorage.getItem('admin_pass') || 'admin777');

                const studentPanelUsernameSetting = ref(localStorage.getItem('student_panel_user') || 'talaba');
                const studentPanelNameSetting = ref(localStorage.getItem('student_panel_name') || "O'quvchi");
                const studentPanelPasswordSetting = ref(localStorage.getItem('student_panel_pass') || '12345');

                const loginTab = ref('student');
                const activeStudentTab = ref('dashboard');
                const studentPanelUnlockPassword = ref('');
                const studentSelectPassword = ref('');
                const studentSelectError = ref('');

                const showAdminVerifyModal = ref(false);
                const adminVerifyPasswordInput = ref('');
                const adminVerifyError = ref('');
                
                // Custom question & explanation modal states
                const showAddQuestionModal = ref(false);
                const showAddQuestionForm = ref(true);
                const editingQuestionId = ref(null);
                const customQuestionText = ref('');
                const customOptA = ref('');
                const customOptB = ref('');
                const customOptC = ref('');
                const customOptD = ref('');
                const customExplanation = ref('');
                const customLevel = ref(1);
                const isSubmittingCustomQuestion = ref(false);
                const showExplanationModal = ref(false);

                // Admin Questions Filtering & Pagination states
                const searchQuestionQuery = ref('');
                const filterQuestionLevel = ref('all');
                const questionCurrentPage = ref(1);
                const questionPageSize = ref(15);
                
                const getDefaultEndDate = () => {
                    const today = new Date();
                    const end = new Date(today.getFullYear(), today.getMonth() + 3, today.getDate());
                    const mm = end.getMonth() + 1;
                    const dd = end.getDate();
                    return `${end.getFullYear()}-${mm < 10 ? '0' + mm : mm}-${dd < 10 ? '0' + dd : dd}`;
                };

                // Manager Panel states
                const newStudent = ref({ name: '', class_name: 'A-10', login: '', password: '', subscription_end_date: getDefaultEndDate() });
                const showAddClassForm = ref(false);
                const newClass = ref({ name: '', type: '' });
                const managerLogs = ref([
                    { time: '03:51', action: 'Menejer boshqaruv paneli ishga tushirildi.' }
                ]);

                const showPaymentChat = ref(false);
                const chatMessages = ref([]);
                const isChatTyping = ref(false);
                const chatSelectedStudentId = ref(null);
                const chatEnteredAmount = ref(800000);
                const chatSelectedPaymentMethod = ref('');
                const chatCustomAmountInput = ref(false);
                const chatCustomAmountVal = ref(800000);
                const showExpenseChat = ref(false);
                const expenseChatMessages = ref([]);
                const isExpenseChatTyping = ref(false);
                const showProfitChat = ref(false);
                const profitChatMessages = ref([]);
                const isProfitChatTyping = ref(false);
                const chatSelectedExpenseCategory = ref('');
                const chatEnteredExpenseAmount = ref(0);
                const chatSelectedExpenseMethod = ref('');
                const chatCustomExpenseInput = ref(false);
                const chatCustomExpenseVal = ref(500000);
                const chatCustomCategoryVal = ref('');
                const chatCustomCategoryInput = ref(false);
                const activeAdminTab = ref('dashboard');
                const activeStudentSubTab = ref('struktura');
                const showAddPartnerForm = ref(false);
                
                const showAddStaffForm = ref(false);
                const newStaff = ref({
                    name: '',
                    role: 'Nazariya o\'qituvchisi',
                    payment_type: 'percentage',
                    base_salary: 4500000,
                    percentage_rate: 40,
                    students_count: 0,
                    tuition_fee_per_student: 800000,
                    login: '',
                    password: ''
                });

                const newPartner = ref({
                    name: '',
                    phone: '',
                    commission: 10
                });

                const partnersList = ref(JSON.parse(localStorage.getItem('partners_list')) || [
                    { id: 1, name: 'Trans-Avto LLC', phone: '+998 (90) 123-45-67', commission: 15, joined_date: '2026-01-15', status: 'Active' },
                    { id: 2, name: 'YHQ Milliy Maktab', phone: '+998 (94) 987-65-43', commission: 10, joined_date: '2026-03-20', status: 'Active' },
                    { id: 3, name: 'Avto-Drayv Hamkor', phone: '+998 (99) 444-55-66', commission: 12, joined_date: '2026-05-02', status: 'Active' }
                ]);

                const studentsList = ref(JSON.parse(localStorage.getItem('students_list')) || [
                    { id: 1, name: 'Alijon Karimov', class_name: 'A-10', today_status: 'keldi', grades: [5, 4, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'alijon', password: 'Alj58' },
                    { id: 2, name: 'Madina Rustamova', class_name: 'A-10', today_status: 'keldi', grades: [4, 4, 3], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'madina', password: 'Mdn73' },
                    { id: 3, name: 'Sardorbek Olimov', class_name: 'B-12', today_status: 'kelmadi', grades: [5, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'sardor', password: 'Srd84' },
                    { id: 4, name: 'Durdona Hakimova', class_name: 'B-12', today_status: 'keldi', grades: [3, 4, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'durdona', password: 'Drd16' },
                    { id: 5, name: 'Javohir Toshpulatov', class_name: 'C-05', today_status: 'keldi', grades: [2, 3, 3], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'javohir', password: 'Jvh30' },
                    { id: 6, name: 'Shahzoda Yusupova', class_name: 'A-10', today_status: 'keldi', grades: [5, 5, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'shahzoda', password: 'Shz51' },
                    { id: 7, name: 'Bekzod Nematov', class_name: 'B-12', today_status: 'keldi', grades: [4, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'bekzod', password: 'Bkz43' },
                    { id: 8, name: 'Nigora Salaydinova', class_name: 'C-05', today_status: 'keldi', grades: [3, 3, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'nigora', password: 'Ngr92' },
                    { id: 9, name: 'Otabek Sobirov', class_name: 'A-10', today_status: 'kelmadi', grades: [4, 4, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'otabek', password: 'Otb74' },
                    { id: 10, name: 'Kamola Tursunova', class_name: 'B-12', today_status: 'keldi', grades: [5, 4, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'kamola', password: 'Kml36' },
                    { id: 11, name: 'Jasur Alimov', class_name: 'C-05', today_status: 'keldi', grades: [4, 3, 3], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'jasur', password: 'Jsr88' },
                    { id: 12, name: 'Nilufar Qodirova', class_name: 'A-10', today_status: 'keldi', grades: [5, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'nilufar', password: 'Nlf27' }
                ]);

                // Sync settings student terminal changes directly to studentsList
                const syncSystemStudentToList = () => {
                    if (!studentsList.value) return;
                    
                    const nameVal = studentPanelNameSetting.value.trim();
                    const loginVal = studentPanelUsernameSetting.value.toLowerCase().trim();
                    const passVal = studentPanelPasswordSetting.value.trim();
                    
                    if (!nameVal || !loginVal || !passVal) return;
                    
                    // Dynamic end date calculation: 3 months from today!
                    const today = new Date();
                    const endDateObj = new Date(today.getFullYear(), today.getMonth() + 3, today.getDate());
                    const endYear = endDateObj.getFullYear();
                    const endMonth = endDateObj.getMonth() + 1;
                    const endDay = endDateObj.getDate();
                    const endMonthStr = endMonth < 10 ? '0' + endMonth : endMonth;
                    const endDayStr = endDay < 10 ? '0' + endDay : endDay;
                    const end_date_val = `${endYear}-${endMonthStr}-${endDayStr}`;
                    
                    // Look up by login to prevent duplicates and keep all previously added students
                    const sysStudent = studentsList.value.find(s => s.login === loginVal);
                    if (sysStudent) {
                        sysStudent.name = nameVal;
                        sysStudent.password = passVal;
                    } else {
                        const nextId = studentsList.value.length ? Math.max(...studentsList.value.map(s => s.id)) + 1 : 1;
                        const newSysStudent = {
                            id: nextId,
                            name: nameVal,
                            class_name: 'A-10',
                            today_status: 'keldi',
                            grades: [5, 5, 5],
                            tuition_status: 'To\'lagan',
                            subscription_end_date: end_date_val,
                            login: loginVal,
                            password: passVal
                        };
                        studentsList.value.push(newSysStudent);
                    }
                };

                // Save settings function
                const saveSystemSettings = () => {
                    const adminUserVal = adminUsernameSetting.value.trim();
                    const adminPassVal = adminPasswordSetting.value.trim();
                    const studentNameVal = studentPanelNameSetting.value.trim();
                    const studentUserVal = studentPanelUsernameSetting.value.toLowerCase().trim();
                    const studentPassVal = studentPanelPasswordSetting.value.trim();
                    
                    if (!adminUserVal || !adminPassVal || !studentNameVal || !studentUserVal || !studentPassVal) {
                        alert("Barcha maydonlarni to'ldiring!");
                        return;
                    }
                    
                    // Save to local storage
                    localStorage.setItem('admin_user', adminUserVal);
                    localStorage.setItem('admin_pass', adminPassVal);
                    localStorage.setItem('student_panel_user', studentUserVal);
                    localStorage.setItem('student_panel_name', studentNameVal);
                    localStorage.setItem('student_panel_pass', studentPassVal);
                    
                    // Sync to studentsList
                    syncSystemStudentToList();
                    
                    alert("Sozlamalar muvaffaqiyatli saqlandi!");
                };

                // Test attempts tracking state
                const selectedReportStudentId = ref(null);
                const studentTestAttemptsList = ref(JSON.parse(localStorage.getItem('attempts_list')) || [
                    { id: 1, student_id: 1, student_name: 'Alijon Karimov', date: '2026-07-08 11:30', score: 18, total_questions: 20, level: 1, status: 'Yiqildi (18/20)' },
                    { id: 2, student_id: 1, student_name: 'Alijon Karimov', date: '2026-07-08 12:15', score: 20, total_questions: 20, level: 1, status: "O'tdi (20/20)" },
                    { id: 3, student_id: 2, student_name: 'Madina Rustamova', date: '2026-07-07 15:40', score: 15, total_questions: 20, level: 1, status: 'Yiqildi (15/20)' },
                    { id: 4, student_id: 3, student_name: 'Sardorbek Olimov', date: '2026-07-08 10:00', score: 20, total_questions: 20, level: 1, status: "O'tdi (20/20)" },
                    { id: 5, student_id: 3, student_name: 'Sardorbek Olimov', date: '2026-07-08 10:45', score: 20, total_questions: 20, level: 2, status: "O'tdi (20/20)" },
                    { id: 6, student_id: 4, student_name: 'Durdona Hakimova', date: '2026-07-06 14:10', score: 19, total_questions: 20, level: 1, status: 'Yiqildi (19/20)' },
                    { id: 7, student_id: 5, student_name: 'Javohir Toshpulatov', date: '2026-07-05 09:30', score: 12, total_questions: 20, level: 1, status: 'Yiqildi (12/20)' }
                ]);

                // Student Feedback & Suggestions state
                const studentFeedbackList = ref(JSON.parse(localStorage.getItem('student_feedback_list')) || [
                    { id: 1, student_id: 1, teacher_name: 'Shavkat Rahmonov', message: 'Nazariya testini topshirishda ko\'proq harakat qiling. Tezlik cheklovlariga oid 5 va 6-savollarga e\'tibor bering. Natijangiz o\'tish baliga yaqin qoldi!', date: '2026-07-08 12:30' },
                    { id: 2, student_id: 2, teacher_name: 'Malika Sobirova', message: 'Tushunmagan savollaringiz bo\'lsa, bemalol dars davomida so\'rashingiz mumkin. Davomat va amaliyot darslarini yaxshilang.', date: '2026-07-07 16:00' }
                ]);

                const loggedInTeacherId = ref(null);
                const activeTeacherTab = ref('students');
                const selectedFeedbackStudentId = ref(null);
                const newFeedbackMessage = ref('');

                const classesList = ref(JSON.parse(localStorage.getItem('classes_list')) || [
                    { name: 'A-10', type: 'Yengil avtomobillar (B)' },
                    { name: 'B-12', type: 'Yuk avtomobillari (C)' },
                    { name: 'C-05', type: 'Tirkamalar (E)' }
                ]);

                const staffList = ref(JSON.parse(localStorage.getItem('staff_list')) || [
                    { id: 1, name: 'Shavkat Rahmonov', role: 'Katta o\'qituvchi', payment_type: 'percentage', base_salary: 3000000, percentage_rate: 40, students_count: 12, tuition_fee_per_student: 800000, login: 'shavkat', password: 'Shv98' },
                    { id: 2, name: 'Malika Sobirova', role: 'Nazariya o\'qituvchisi', payment_type: 'fixed', base_salary: 4500000, percentage_rate: 30, students_count: 15, tuition_fee_per_student: 800000, login: 'malika', password: 'Mlk47' },
                    { id: 3, name: 'Jamshid Tojiyev', role: 'Amaliy yo\'riqchi', payment_type: 'percentage', base_salary: 2500000, percentage_rate: 50, students_count: 8, tuition_fee_per_student: 800000, login: 'jamshid', password: 'Jms62' },
                    { id: 4, name: 'Nodira Azimova', role: 'Bosh hisobchi', payment_type: 'fixed', base_salary: 5000000, percentage_rate: 0, students_count: 0, tuition_fee_per_student: 0, login: 'nodira', password: 'Ndr39' }
                ]);

                const teachersDisplayList = ref([
                    { name: 'GULOMOVA ZARNIGOR', role: 'Tibbiyot o\'qituvchisi' },
                    { name: 'RAXMATOV DOSTON', role: 'Amaliy usta' },
                    { name: 'ABBOSOV SUXROB', role: 'Amaliy usta' },
                    { name: 'ARIPOV BAXTIYOR', role: 'Amaliy usta' }
                ]);

                const carsDisplayList = ref([
                    { 
                        name: 'COBALT', 
                        plate: '30 611 YBA', 
                        image: 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?w=300&auto=format&fit=crop&q=80' 
                    },
                    { 
                        name: 'NEXIA R3', 
                        plate: '30 U 634 UA', 
                        image: 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=300&auto=format&fit=crop&q=80' 
                    },
                    { 
                        name: 'CHEVROLET ONIX', 
                        plate: '30 V 642 PB', 
                        image: 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=300&auto=format&fit=crop&q=80' 
                    }
                ]);

                const financeTransactionsList = ref(JSON.parse(localStorage.getItem('finance_transactions_list')) || [
                    { id: 1, type: 'kirim', category: 'O\'quvchi to\'lovi (Alijon Karimov)', amount: 800000, date: '2026-07-08 09:15' },
                    { id: 2, type: 'kirim', category: 'O\'quvchi to\'lovi (Sardorbek Olimov)', amount: 800000, date: '2026-07-08 10:30' },
                    { id: 3, type: 'chiqim', category: 'Ofis ijarasi va elektr energiyasi', amount: 1500000, date: '2026-07-07 18:00' },
                    { id: 4, type: 'kirim', category: 'O\'quvchi to\'lovi (Durdona Hakimova)', amount: 800000, date: '2026-07-07 14:20' },
                    { id: 5, type: 'chiqim', category: 'O\'quvchi qo\'llanmalari chop etish', amount: 600000, date: '2026-07-06 11:00' }
                ]);

                // Timer parameters
                const totalSeconds = ref(25 * 60); // 25 minutes
                const testFinished = ref(false);
                let timerInterval = null;

                // Shuffle helper function for questions
                const shuffleArray = (array) => {
                    const arr = [...array];
                    for (let i = arr.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [arr[i], arr[j]] = [arr[j], arr[i]];
                    }
                    return arr;
                };

                // Shuffle helper to shuffle options of a question uniformly across all languages
                const shuffleQuestionOptions = (q) => {
                    const langs = Object.keys(q.translations);
                    if (langs.length === 0) return q;

                    const refLang = langs[0];
                    const optionsCount = q.translations[refLang].options.length;

                    // Generate a random permutation of indices [0, 1, 2, ..., optionsCount - 1]
                    const indices = Array.from({ length: optionsCount }, (_, i) => i);
                    for (let i = indices.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [indices[i], indices[j]] = [indices[j], indices[i]];
                    }

                    // Create a clone to prevent mutating shared objects directly in reactive loops
                    const qClone = JSON.parse(JSON.stringify(q));

                    // Apply this same index mapping to all translations of the cloned question
                    langs.forEach(lang => {
                        const originalOptions = q.translations[lang].options;
                        const shuffledOptions = indices.map(idx => originalOptions[idx]);
                        qClone.translations[lang].options = shuffledOptions;
                    });

                    return qClone;
                };

                // Circular dashoffset computation
                const dashOffset = computed(() => {
                    const maxOffset = 263.89; // 2 * PI * r (r=42)
                    const totalMaxSeconds = 25 * 60;
                    return maxOffset - (totalSeconds.value / totalMaxSeconds) * maxOffset;
                });

                // Format time as MM:SS
                const formattedTime = computed(() => {
                    const mins = String(Math.floor(totalSeconds.value / 60)).padStart(2, '0');
                    const secs = String(totalSeconds.value % 60).padStart(2, '0');
                    return `${mins}:${secs}`;
                });

                // Get current question properties
                const currentQuestion = computed(() => {
                    return questions.value[currentQuestionIndex.value] || null;
                });

                // Get translation of current question
                const currentQuestionData = computed(() => {
                    if (!currentQuestion.value) return { question: '', options: [] };
                    return currentQuestion.value.translations[currentLang.value] || { question: '', options: [] };
                });

                const currentQuestionId = computed(() => {
                    return currentQuestion.value ? currentQuestion.value.id : null;
                });

                const currentCorrectOptionId = computed(() => {
                    return currentQuestion.value ? currentQuestion.value.correct_option_id : '';
                });

                // Score computation
                const score = computed(() => {
                    let totalCorrect = 0;
                    questions.value.forEach(q => {
                        if (userAnswers.value[q.id] === q.correct_option_id) {
                            totalCorrect++;
                        }
                    });
                    return totalCorrect;
                });

                // Filtered attempts list based on selected student in report
                const filteredAttempts = computed(() => {
                    if (selectedReportStudentId.value === null) {
                        return studentTestAttemptsList.value;
                    }
                    return studentTestAttemptsList.value.filter(a => a.student_id === selectedReportStudentId.value);
                });

                const getAverageScoreForStudent = (studentId) => {
                    const studentAttempts = studentTestAttemptsList.value.filter(a => a.student_id === studentId);
                    if (studentAttempts.length === 0) return '0.0';
                    const sum = studentAttempts.reduce((a, b) => a + b.score, 0);
                    return (sum / studentAttempts.length).toFixed(1);
                };

                const getAverageScoreClassForStudent = (studentId) => {
                    const avg = parseFloat(getAverageScoreForStudent(studentId));
                    if (avg >= 20.0) return 'bg-emerald-100 text-emerald-700';
                    if (avg >= 16.0) return 'bg-amber-100 text-amber-700';
                    return 'bg-rose-100 text-rose-700';
                };

                // Filtered review questions list (correct vs incorrect vs all)
                const filteredReviewQuestions = computed(() => {
                    return questions.value.filter(q => {
                        const isCorrect = userAnswers.value[q.id] === q.correct_option_id;
                        if (reviewFilter.value === 'correct') return isCorrect;
                        if (reviewFilter.value === 'incorrect') return !isCorrect;
                        return true;
                    });
                });

                // Sorting order: 'desc' (newest first) or 'asc' (oldest first)
                const questionSortOrder = ref('desc');

                // Filtered admin questions with search & level filter & sorting
                const filteredAdminQuestions = computed(() => {
                    let list = [...(adminQuestionsList.value || [])];
                    if (filterQuestionLevel.value !== 'all') {
                        const lvl = parseInt(filterQuestionLevel.value, 10);
                        list = list.filter(q => q.level === lvl);
                    }
                    if (searchQuestionQuery.value.trim()) {
                        const query = searchQuestionQuery.value.toLowerCase().trim();
                        list = list.filter(q => {
                            const qText = q.translations?.uz_lat?.question || q.translations?.uz_cyr?.question || '';
                            const optTexts = (q.translations?.uz_lat?.options || []).map(o => o.text).join(' ');
                            return qText.toLowerCase().includes(query) || optTexts.toLowerCase().includes(query) || String(q.id).includes(query);
                        });
                    }
                    if (questionSortOrder.value === 'desc') {
                        list.sort((a, b) => Number(b.id) - Number(a.id));
                    } else {
                        list.sort((a, b) => Number(a.id) - Number(b.id));
                    }
                    return list;
                });

                const totalQuestionPages = computed(() => {
                    return Math.max(1, Math.ceil(filteredAdminQuestions.value.length / questionPageSize.value));
                });

                const paginatedAdminQuestions = computed(() => {
                    const start = (questionCurrentPage.value - 1) * questionPageSize.value;
                    return filteredAdminQuestions.value.slice(start, start + questionPageSize.value);
                });

                const prevQuestionPage = () => {
                    if (questionCurrentPage.value > 1) {
                        questionCurrentPage.value--;
                    }
                };

                const nextQuestionPage = () => {
                    if (questionCurrentPage.value < totalQuestionPages.value) {
                        questionCurrentPage.value++;
                    }
                };

                const loadAllQuestionsForAdmin = async () => {
                    try {
                        const response = await fetch('/api/v1/all-questions');
                        const data = await response.json();
                        adminQuestionsList.value = data.data;
                        adminQuestionsCount.value = data.count;
                    } catch (e) {
                        console.error("Error loading admin questions:", e);
                    }
                };

                // Load questions from API, shuffle choices, and shuffle questions
                const loadQuestions = async () => {
                    loading.value = true;
                    try {
                        const response = await fetch(`/api/v1/questions?level=${currentLevel.value}`);
                        const data = await response.json();
                        // Shuffle options inside each question uniformly
                        const processed = data.data.map(q => shuffleQuestionOptions(q));
                        // Shuffle questions list
                        questions.value = shuffleArray(processed);
                    } catch (e) {
                        console.error("API error loading questions:", e);
                    } finally {
                        loading.value = false;
                    }
                };

                // Set selected language
                const setLanguage = (lang) => {
                    currentLang.value = lang;
                };

                // Select Option
                const audioMessage = ref('');

                // Pre-load voices
                let cachedVoices = [];
                const loadVoices = () => {
                    cachedVoices = window.speechSynthesis ? window.speechSynthesis.getVoices() : [];
                };
                if (window.speechSynthesis) {
                    loadVoices();
                    window.speechSynthesis.onvoiceschanged = loadVoices;
                }

                const cyrillicToLatin = (text) => {
                    const mapping = {
                        'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 'Е': 'E', 'Ё': 'Yo', 'Ж': 'J', 'З': 'Z', 'И': 'I', 'Й': 'Y', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O', 'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'X', 'Ц': 'Ts', 'Ч': 'Ch', 'Ш': 'Sh', 'Щ': 'Sh', 'Ъ': "'", 'Ы': 'Y', 'Ь': '', 'Э': 'E', 'Ю': 'Yu', 'Я': 'Ya', 'Ў': 'O\'', 'Қ': 'Q', 'Ғ': 'G\'', 'Ҳ': 'H',
                        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo', 'ж': 'j', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'x', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': "'", 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya', 'ў': 'o\'', 'қ': 'q', 'ғ': 'g\'', 'ҳ': 'h'
                    };
                    return text.split('').map(char => mapping[char] || char).join('');
                };

                const qrToUzbekTTS = (text) => {
                    // Qoraqalpoq maxsus harflarini o'zbek TTS (uz-UZ) o'qiy olishi uchun moslashtirish
                    return text.replace(/ó/g, "o'").replace(/Ó/g, "O'")
                               .replace(/ǵ/g, "g'").replace(/Ǵ/g, "G'")
                               .replace(/ń/g, "ng").replace(/Ń/g, "Ng")
                               .replace(/ı/g, "i").replace(/Í/g, "I")
                               .replace(/ú/g, "u").replace(/Ú/g, "U")
                               .replace(/á/g, "a").replace(/Á/g, "A")
                               .replace(/ń/g, "ng").replace(/Ń/g, "Ng");
                };

                const speakExplanation = (text, onEndCallback = null) => {
                    try {
                        let textToSpeak = text;
                        if (currentLang.value === 'qr') {
                            textToSpeak = qrToUzbekTTS(text);
                        }

                        // Estimate reading duration to prevent instant skipping
                        const wordCount = textToSpeak.split(' ').length;
                        const estimatedSeconds = Math.max(3.5, (wordCount * 0.42)); // At least 3.5 seconds
                        const minDurationMs = estimatedSeconds * 1000;
                        let startTime = Date.now();

                        let keepAliveInterval = null;
                        let callbackCalled = false;
                        
                        const safeOnEndCallback = () => {
                            if (callbackCalled) return;
                            callbackCalled = true;
                            
                            if (keepAliveInterval) {
                                clearInterval(keepAliveInterval);
                            }

                            const elapsed = Date.now() - startTime;
                            if (elapsed < minDurationMs) {
                                setTimeout(() => {
                                    if (onEndCallback) onEndCallback();
                                }, minDurationMs - elapsed);
                            } else {
                                if (onEndCallback) onEndCallback();
                            }
                        };

                        if (!window.speechSynthesis) {
                            setTimeout(safeOnEndCallback, minDurationMs);
                            return;
                        }

                        // Cancel current speech and prepare
                        window.speechSynthesis.cancel();

                        const voices = cachedVoices.length ? cachedVoices : window.speechSynthesis.getVoices();
                        
                        // Always search for the Uzbek voice first to keep the speaker completely consistent
                        let chosen = voices.find(v => v.lang.startsWith('uz') && (v.name.toLowerCase().includes('female') || v.name.toLowerCase().includes('woman') || v.name.toLowerCase().includes('madina') || v.name.toLowerCase().includes('zira')));
                        if (!chosen) {
                            chosen = voices.find(v => v.lang.startsWith('uz'));
                        }
                        // Fallback to any female voice if Uzbek voice is not installed on the system
                        if (!chosen) {
                            chosen = voices.find(v => v.name.toLowerCase().includes('female') || v.name.toLowerCase().includes('woman') || v.name.toLowerCase().includes('madina') || v.name.toLowerCase().includes('zira'));
                        }
                        if (!chosen) {
                            chosen = voices[0] || null;
                        }

                        let targetLang = 'uz-UZ';
                        if (currentLang.value === 'ru') {
                            targetLang = 'ru-RU';
                        } else if (currentLang.value === 'en') {
                            targetLang = 'en-US';
                        }

                        const utter = new SpeechSynthesisUtterance(textToSpeak);
                        if (chosen) {
                            utter.voice = chosen;
                        }
                        utter.lang = targetLang;
                        
                        utter.rate = 0.85;
                        utter.pitch = 0.9;
                        utter.volume = 0.9;
                        
                        window.currentUtter = utter; 

                        utter.onstart = () => {
                            startTime = Date.now();
                        };

                        utter.onend = () => { safeOnEndCallback(); };
                        utter.onerror = () => { safeOnEndCallback(); };
                        
                        // Failsafe: agar TTS qotib qolsa (12 soniya)
                        setTimeout(() => {
                            if (window.currentUtter === utter) {
                                safeOnEndCallback();
                                window.currentUtter = null;
                            }
                        }, 12000);

                        // Chrome keep-alive hack: har 4 soniyada pause/resume qilamiz
                        keepAliveInterval = setInterval(() => {
                            if (window.speechSynthesis && window.speechSynthesis.speaking) {
                                window.speechSynthesis.pause();
                                window.speechSynthesis.resume();
                            } else {
                                clearInterval(keepAliveInterval);
                            }
                        }, 4000);

                        // Speak immediately (do not wrap in setTimeout, otherwise mobile browsers block it due to user gesture policy)
                        try {
                            window.speechSynthesis.resume();
                            window.speechSynthesis.speak(utter);
                        } catch (err) {
                            console.error("Speech play failed:", err);
                        }
                    } catch (e) {
                        console.error("speakExplanation dynamic error caught:", e);
                        if (onEndCallback) {
                            try { onEndCallback(); } catch(err) {}
                        }
                    }
                };

                const readQuestionAloud = () => {
                    try {
                        if (!currentQuestion.value) return;
                        const translation = getTranslation(currentQuestion.value, currentLang.value);
                        const questionText = translation.question || '';
                        
                        try {
                            window.speechSynthesis.cancel();
                        } catch (e) {}
                        
                        speakExplanation(questionText);
                    } catch (e) {
                        console.error("readQuestionAloud error:", e);
                    }
                };

                const selectOption = (optId) => {
                    if (!currentQuestion.value) return;
                    if (userAnswers.value[currentQuestion.value.id] !== undefined) return;

                    userAnswers.value[currentQuestion.value.id] = optId;

                    const translation = getTranslation(currentQuestion.value, currentLang.value);
                    const correctOpt = translation.options ? translation.options.find(o => o.id === currentQuestion.value.correct_option_id) : null;
                    const correctText = correctOpt ? correctOpt.text : '';
                    const questionText = translation.question || '';

                    try {
                        window.speechSynthesis.cancel();
                    } catch (e) {}

                    try {
                        if (optId === currentQuestion.value.correct_option_id) {
                            const msg = t('tts_correct_prefix') + " " + questionText + " " + t('tts_correct_mid') + " " + correctText + " " + t('tts_correct_end');
                            audioMessage.value = { type: 'correct', text: `${t('panel_correct')} ${correctText}` };
                            speakExplanation(msg);
                        } else {
                            const baseMsg = t('tts_wrong_prefix') + " " + questionText + " " + t('tts_wrong_mid') + " " + correctText + " " + t('tts_wrong_end');
                            const reasonMsg = t('tts_prohibited_reason') ? " " + t('tts_prohibited_reason') : '';
                            const explMsg = t('tts_prohibited_explanation') ? " " + t('tts_prohibited_explanation') : '';
                            const msg = baseMsg + reasonMsg + explMsg;
                            audioMessage.value = { type: 'wrong', text: `${t('panel_wrong')} ${correctText}` };
                            speakExplanation(msg);
                        }
                    } catch (speechError) {
                        console.error("Speech playback error caught:", speechError);
                    }

                    setTimeout(() => {
                        audioMessage.value = '';
                        if (currentQuestionIndex.value < questions.value.length - 1) {
                            currentQuestionIndex.value++;
                        } else {
                            finishTest();
                        }
                    }, 1200);
                };

                // Go to question index
                const gotoQuestion = (idx) => {
                    currentQuestionIndex.value = idx;
                };

                const nextQuestion = () => {
                    if (currentQuestionIndex.value < questions.value.length - 1) {
                        currentQuestionIndex.value++;
                    } else {
                        finishTest();
                    }
                };

                const prevQuestion = () => {
                    if (currentQuestionIndex.value > 0) {
                        currentQuestionIndex.value--;
                    }
                };

                // Finish Test
                const finishTest = () => {
                    clearInterval(timerInterval);
                    testFinished.value = true;
                    
                    const currentStudent = studentsList.value.find(s => s.id === loggedInStudentId.value);
                    if (currentStudent) {
                        const now = new Date();
                        const timeStr = now.toISOString().replace('T', ' ').substring(0, 16);
                        const correctCount = score.value;
                        const passStatus = correctCount >= 20 ? "O'tdi (20/20)" : `Yiqildi (${correctCount}/20)`;
                        
                        studentTestAttemptsList.value.unshift({
                            id: studentTestAttemptsList.value.length + 1,
                            student_id: currentStudent.id,
                            student_name: currentStudent.name,
                            date: timeStr,
                            score: correctCount,
                            total_questions: questions.value.length,
                            level: currentLevel.value,
                            status: passStatus
                        });

                        let gradeVal = 2;
                        if (correctCount >= 20) gradeVal = 5;
                        else if (correctCount >= 16) gradeVal = 4;
                        else if (correctCount >= 10) gradeVal = 3;
                        currentStudent.grades.push(gradeVal);
                    }
                    
                    nextTick(() => {
                        if (window.lucide) window.lucide.createIcons();
                    });
                };

                // Timer Tick Down
                const startTimer = () => {
                    clearInterval(timerInterval);
                    totalSeconds.value = 25 * 60;
                    timerInterval = setInterval(() => {
                        if (totalSeconds.value > 0) {
                            totalSeconds.value--;
                        } else {
                            finishTest();
                        }
                    }, 1000);
                };

                // Reset Test
                const resetTest = async () => {
                    userAnswers.value = {};
                    currentQuestionIndex.value = 0;
                    testFinished.value = false;
                    reviewFilter.value = 'all';
                    isTestStarted.value = false;
                    if (loggedInUserType.value === 'student') {
                        activeStudentTab.value = 'dashboard';
                    }
                    // Load fresh questions for current level from backend
                    await loadQuestions();
                };

                const confirmAndResetTest = () => {
                    resetTest();
                };

                const startActualTest = () => {
                    studentSelectError.value = '';
                    
                    if (loggedInUserType.value !== 'student' && selectedStudentId.value !== null) {
                        const student = studentsList.value.find(s => s.id === selectedStudentId.value);
                        if (student) {
                            loggedInStudentId.value = student.id;
                        }
                    }

                    isTestStarted.value = true;
                    startTimer();
                };

                // Get dynamic SVG illustrations based on question keywords
                const getQuestionIllustration = (q) => {
                    if (!q) return '';
                    
                    const qText = q.translations.uz_lat.question.toLowerCase();
                    const svgWidth = "120";
                    const svgHeight = "120";

                    if (qText.includes("tezligi")) { // Speed Limit 60
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" stroke="#dc2626" stroke-width="8" fill="#ffffff" />
                            <text x="50" y="62" fill="#000000" font-family="sans-serif" font-weight="900" font-size="34" text-anchor="middle">60</text>
                        </svg>`;
                    }
                    if (qText.includes("miltillovchi")) { // Traffic light green flashing
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 60 120">
                            <rect x="5" y="5" width="50" height="110" rx="10" fill="#1e293b" />
                            <circle cx="30" cy="28" r="14" fill="#3f3f46" />
                            <circle cx="30" cy="60" r="14" fill="#3f3f46" />
                            <circle cx="30" cy="92" r="14" fill="#10b981" class="animate-pulse" />
                        </svg>`;
                    }
                    if (qText.includes("piyodalar")) { // Pedestrian crossing
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                            <rect x="5" y="5" width="90" height="90" rx="12" fill="#0066cc" />
                            <polygon points="50,15 15,80 85,80" fill="#ffffff" />
                            <circle cx="50" cy="40" r="6" fill="#000000" />
                            <path d="M50 46 L50 62 M50 48 L42 56 M50 48 L58 56 M50 62 L42 74 M50 62 L58 74" stroke="#000000" stroke-width="4" stroke-linecap="round" />
                            <rect x="25" y="70" width="50" height="4" fill="#000000" />
                        </svg>`;
                    }
                    if (qText.includes("shatakka")) { // Towing
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                            <polygon points="50,10 5,85 95,85" stroke="#dc2626" stroke-width="8" stroke-linejoin="round" fill="#ffffff" />
                            <rect x="20" y="55" width="22" height="12" rx="2" fill="#475569" />
                            <circle cx="25" cy="70" r="4" fill="#000" />
                            <circle cx="37" cy="70" r="4" fill="#000" />
                            <rect x="55" y="55" width="22" height="12" rx="2" fill="#94a3b8" />
                            <circle cx="60" cy="70" r="4" fill="#000" />
                            <circle cx="72" cy="70" r="4" fill="#000" />
                            <line x1="42" y1="62" x2="55" y2="62" stroke="#dc2626" stroke-width="3" stroke-dasharray="2,2" />
                        </svg>`;
                    }
                    if (qText.includes("aylanma")) { // Roundabout
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" fill="#0066cc" />
                            <circle cx="50" cy="50" r="22" fill="#0066cc" stroke="#ffffff" stroke-width="6" stroke-dasharray="20,10" />
                            <path d="M48 22 L55 28 L48 34" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            <path d="M78 48 L72 55 L66 48" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                            <path d="M22 48 L28 41 L34 48" stroke="#ffffff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                        </svg>`;
                    }
                    if (qText.includes("quvib")) { // Overtaking Prohibited
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" stroke="#dc2626" stroke-width="8" fill="#ffffff" />
                            <rect x="28" y="44" width="18" height="24" rx="3" fill="#dc2626" />
                            <rect x="54" y="44" width="18" height="24" rx="3" fill="#000000" />
                        </svg>`;
                    }
                    if (qText.includes("telefon")) { // Phone Prohibited
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="45" stroke="#dc2626" stroke-width="8" fill="#ffffff" />
                            <rect x="38" y="28" width="24" height="44" rx="6" fill="#1e293b" />
                            <rect x="42" y="34" width="16" height="28" fill="#ffffff" />
                            <circle cx="50" cy="66" r="2.5" fill="#ffffff" />
                            <line x1="15" y1="15" x2="85" y2="85" stroke="#dc2626" stroke-width="8" />
                        </svg>`;
                    }
                    if (qText.includes("qo'shimcha tarmoq")) { // Traffic light with green arrow plate
                        return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 120 100">
                            <rect x="15" y="10" width="40" height="80" rx="8" fill="#1e293b" />
                            <circle cx="35" cy="26" r="10" fill="#dc2626" />
                            <circle cx="35" cy="50" r="10" fill="#3f3f46" />
                            <circle cx="35" cy="74" r="10" fill="#3f3f46" />
                            <rect x="65" y="40" width="40" height="20" rx="3" fill="#ffffff" stroke="#000" stroke-width="2" />
                            <path d="M72 50 L92 50 M86 44 L94 50 L86 56" stroke="#10b981" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                        </svg>`;
                    }

                    // Default Warning Sign
                    return `<svg width="${svgWidth}" height="${svgHeight}" viewBox="0 0 100 100">
                        <polygon points="50,10 5,85 95,85" stroke="#dc2626" stroke-width="8" stroke-linejoin="round" fill="#ffffff" />
                        <text x="50" y="70" fill="#000" font-family="sans-serif" font-weight="900" font-size="44" text-anchor="middle">!</text>
                    </svg>`;
                };
                // Admin Panel state helpers

                // Calculate Teacher Salary
                const calculateTeacherSalary = (teacher) => {
                    if (teacher.payment_type === 'fixed') {
                        return teacher.base_salary;
                    } else {
                        // percentage calculation: students * tuition * percent
                        return teacher.students_count * teacher.tuition_fee_per_student * (teacher.percentage_rate / 100);
                    }
                };

                // Money Formatter
                const formatMoney = (val) => {
                    return Number(val).toLocaleString('uz-UZ') + ' UZS';
                };

                // Add Partner
                const addPartner = () => {
                    if (!newPartner.value.name) return;
                    partnersList.value.push({
                        id: partnersList.value.length + 1,
                        name: newPartner.value.name,
                        phone: newPartner.value.phone || '+998 (90) 000-00-00',
                        commission: newPartner.value.commission || 10,
                        joined_date: new Date().toISOString().split('T')[0],
                        status: 'Active'
                    });
                    newPartner.value = { name: '', phone: '', commission: 10 };
                    showAddPartnerForm.value = false;
                };

                // Add New Staff / Teacher
                const addNewStaff = () => {
                    if (!newStaff.value.name || !newStaff.value.login || !newStaff.value.password) {
                        alert("Iltimos, o'qituvchi ismi, login va parolini to'liq kiriting!");
                        return;
                    }

                    const existing = staffList.value.find(
                        t => t.login && String(t.login).toLowerCase().trim() === String(newStaff.value.login).toLowerCase().trim()
                    );
                    if (existing) {
                        alert("Bunday loginli o'qituvchi allaqachon mavjud! Iltimos, boshqa login tanlang.");
                        return;
                    }

                    const nextId = staffList.value.length ? Math.max(...staffList.value.map(t => t.id)) + 1 : 1;
                    const staffObj = {
                        id: nextId,
                        name: newStaff.value.name.trim(),
                        role: newStaff.value.role.trim() || "O'qituvchi",
                        payment_type: newStaff.value.payment_type || 'percentage',
                        base_salary: Number(newStaff.value.base_salary) || 4000000,
                        percentage_rate: Number(newStaff.value.percentage_rate) || 40,
                        students_count: Number(newStaff.value.students_count) || 0,
                        tuition_fee_per_student: 800000,
                        login: String(newStaff.value.login).toLowerCase().trim(),
                        password: String(newStaff.value.password).trim()
                    };

                    staffList.value.push(staffObj);
                    localStorage.setItem('staff_list', JSON.stringify(staffList.value));
                    triggerPushState();

                    alert(`🎉 Yangi o'qituvchi muvaffaqiyatli saqlandi!\n\nIsmi: ${staffObj.name}\nLogin: ${staffObj.login}\nParol: ${staffObj.password}\n\nEndi ushbu o'qituvchi profili faol va tizimga to'g'ridan-to'g'ri kira oladi.`);
                    
                    newStaff.value = {
                        name: '',
                        role: 'Nazariya o\'qituvchisi',
                        payment_type: 'percentage',
                        base_salary: 4500000,
                        percentage_rate: 40,
                        students_count: 0,
                        tuition_fee_per_student: 800000,
                        login: '',
                        password: ''
                    };
                    showAddStaffForm.value = false;
                };

                // Save individual staff member login/password and data
                const saveStaffMember = (teacher) => {
                    if (!teacher.name || !teacher.login || !teacher.password) {
                        alert("Xodim ismi, login va paroli bo'sh bo'lishi mumkin emas!");
                        return;
                    }
                    localStorage.setItem('staff_list', JSON.stringify(staffList.value));
                    triggerPushState();
                    alert(`✅ ${teacher.name} (${teacher.role || 'Xodim'}) ma'lumotlari, logini (${teacher.login}) va paroli (${teacher.password}) muvaffaqiyatli saqlandi!`);
                };

                // Delete staff member
                const deleteStaffMember = (teacherId) => {
                    const teacher = staffList.value.find(t => t.id === teacherId);
                    if (!teacher) return;
                    if (confirm(`${teacher.name}ni o'qituvchilar safidan o'chirishni tasdiqlaysizmi?`)) {
                        staffList.value = staffList.value.filter(t => t.id !== teacherId);
                        localStorage.setItem('staff_list', JSON.stringify(staffList.value));
                        triggerPushState();
                        alert("O'qituvchi muvaffaqiyatli o'chirildi.");
                    }
                };

                // Add Student Grade
                const addStudentGrade = (studentId, grade) => {
                    const student = studentsList.value.find(s => s.id === studentId);
                    if (student) {
                        student.grades.push(grade);
                    }
                };

                const deleteStudentGrade = (studentId, gradeIndex) => {
                    const student = studentsList.value.find(s => s.id === studentId);
                    if (student && student.grades) {
                        student.grades.splice(gradeIndex, 1);
                    }
                };

                // School Payment Chat Bot functions
                const openPaymentChat = () => {
                    showPaymentChat.value = true;
                    chatSelectedStudentId.value = null;
                    chatEnteredAmount.value = 800000;
                    chatSelectedPaymentMethod.value = '';
                    chatCustomAmountInput.value = false;
                    chatCustomAmountVal.value = 800000;
                    
                    chatMessages.value = [
                        { 
                            sender: 'bot', 
                            text: "Salom! Men Avtotest To'lov yordamchisiman. O'quvchilardan maktabga to'lov qabul qilish uchun quyidagi ro'yxatdan o'quvchini tanlang:",
                            type: 'select_student'
                        }
                    ];
                    
                    nextTick(() => {
                        const chatBody = document.getElementById('chat-body');
                        if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
                    });
                };

                const addBotMessage = (text, type = 'text', delay = 800) => {
                    isChatTyping.value = true;
                    setTimeout(() => {
                        isChatTyping.value = false;
                        chatMessages.value.push({ sender: 'bot', text, type });
                        
                        nextTick(() => {
                            const chatBody = document.getElementById('chat-body');
                            if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
                        });
                    }, delay);
                };

                const handleSelectStudentInChat = (studentId) => {
                    chatSelectedStudentId.value = studentId;
                    const student = studentsList.value.find(s => s.id === studentId);
                    if (!student) return;
                    
                    chatMessages.value.push({ sender: 'user', text: student.name });
                    
                    addBotMessage(
                        `${student.name} uchun to'lov miqdorini belgilang. Maktabimizda o'qish uchun standart to'lov miqdori 800 000 UZS qilib belgilangan. Boshqa miqdor kiritishni ham tanlashingiz mumkin:`,
                        'select_amount'
                    );
                };

                const handleSelectAmountInChat = (amount) => {
                    chatEnteredAmount.value = amount;
                    chatMessages.value.push({ sender: 'user', text: formatMoney(amount) });
                    
                    addBotMessage(
                        "Ajoyib. Endi to'lov amalga oshirilgan usulni tanlang:",
                        'select_method'
                    );
                };

                const handleCustomAmountInChat = (amount) => {
                    if (!amount || amount <= 0) return;
                    chatEnteredAmount.value = amount;
                    chatMessages.value.push({ sender: 'user', text: formatMoney(amount) });
                    chatCustomAmountInput.value = false;
                    
                    addBotMessage(
                        "Ajoyib. Endi to'lov amalga oshirilgan usulni tanlang:",
                        'select_method'
                    );
                };

                const handleSelectMethodInChat = (method) => {
                    chatSelectedPaymentMethod.value = method;
                    chatMessages.value.push({ sender: 'user', text: method });
                    
                    const student = studentsList.value.find(s => s.id === chatSelectedStudentId.value);
                    
                    addBotMessage(
                        `Barcha ma'lumotlar to'g'ri. O'quvchi: ${student.name}, To'lov miqdori: ${formatMoney(chatEnteredAmount.value)}, To'lov usuli: ${method}. To'lovni tasdiqlash uchun pastdagi tugmani bosing:`,
                        'confirm'
                    );
                };

                const handleConfirmPaymentInChat = () => {
                    const student = studentsList.value.find(s => s.id === chatSelectedStudentId.value);
                    if (!student) return;
                    
                    student.tuition_status = "To'lagan";
                    renewStudentSubscription(student.id);
                    
                    chatMessages.value.push({ sender: 'user', text: "Tasdiqlayman" });
                    
                    addBotMessage(
                        `🎉 Muvaffaqiyatli! ${student.name} uchun ${formatMoney(chatEnteredAmount.value)} miqdoridagi to'lov qabul qilindi. Endi "TEST TOPSHIRISHNI BOSHLAYMIZ" tugmasi orqali imtihon topshirishingiz mumkin!`,
                        'success'
                    );
                };

                // School Expense Chat Bot functions
                const openExpenseChat = () => {
                    showExpenseChat.value = true;
                    chatSelectedExpenseCategory.value = '';
                    chatEnteredExpenseAmount.value = 0;
                    chatSelectedExpenseMethod.value = '';
                    chatCustomExpenseInput.value = false;
                    chatCustomExpenseVal.value = 500000;
                    chatCustomCategoryVal.value = '';
                    chatCustomCategoryInput.value = false;
                    
                    expenseChatMessages.value = [
                        {
                            sender: 'bot',
                            text: "Salom! Men Avtotest Chiqimlar yordamchisiman. Bizning barcha chiqimlarimiz nima uchun va qayerga ketayotganini ko'rishni istaysizmi yoki yangi chiqim yozmoqchimisiz?",
                            type: 'start'
                        }
                    ];
                    
                    nextTick(() => {
                        const chatBody = document.getElementById('expense-chat-body');
                        if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
                    });
                };

                const addExpenseBotMessage = (text, type = 'text', delay = 800) => {
                    isExpenseChatTyping.value = true;
                    setTimeout(() => {
                        isExpenseChatTyping.value = false;
                        expenseChatMessages.value.push({ sender: 'bot', text, type });
                        
                        nextTick(() => {
                            const chatBody = document.getElementById('expense-chat-body');
                            if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
                        });
                    }, delay);
                };

                const handleViewReportInChat = () => {
                    expenseChatMessages.value.push({ sender: 'user', text: "📊 Chiqimlar hisoboti" });
                    
                    let staffPayouts = 0;
                    let staffDetails = "";
                    staffList.value.forEach(t => {
                        const sal = calculateTeacherSalary(t);
                        staffPayouts += sal;
                        staffDetails += `\n• ${t.name} (${t.role}): ${formatMoney(sal)}`;
                    });

                    const trExpenses = financeTransactionsList.value
                        .filter(t => t.type === 'chiqim');
                    const expensesTotal = trExpenses.reduce((sum, t) => sum + t.amount, 0);
                    
                    let trDetails = "";
                    trExpenses.forEach(t => {
                        trDetails += `\n• ${t.category} (${t.date}): ${formatMoney(t.amount)}`;
                    });

                    const totalChiqimVal = staffPayouts + expensesTotal;

                    const reportText = `Chiqimlarimiz quyidagi sohalarga sarflanmoqda:\n\n` +
                        `🧑‍🏫 O'QITUVCHILAR OYLIKLARI: ${formatMoney(staffPayouts)}\n` +
                        `${staffDetails}\n\n` +
                        `🏢 BOSHQA HARAJATLAR: ${formatMoney(expensesTotal)}\n` +
                        `${trDetails || "\n• Hozircha boshqa harajatlar yo'q."}\n\n` +
                        `📈 JAMI CHIQIMLAR: ${formatMoney(totalChiqimVal)}`;

                    addExpenseBotMessage(reportText, 'report_options');
                };

                const handleStartNewExpenseInChat = () => {
                    expenseChatMessages.value.push({ sender: 'user', text: "➕ Yangi chiqim yozish" });
                    
                    addExpenseBotMessage(
                        "Tushunarli. Chiqim sababini yoki toifasini tanlang:",
                        'select_category'
                    );
                };

                const handleSelectCategoryInChat = (category) => {
                    chatSelectedExpenseCategory.value = category;
                    expenseChatMessages.value.push({ sender: 'user', text: category });
                    
                    addExpenseBotMessage(
                        `"${category}" xarajati uchun to'lov miqdorini belgilang (UZS):`,
                        'select_amount'
                    );
                };

                const handleCustomCategoryInChat = (category) => {
                    if (!category) return;
                    chatSelectedExpenseCategory.value = category;
                    expenseChatMessages.value.push({ sender: 'user', text: category });
                    chatCustomCategoryInput.value = false;
                    
                    addExpenseBotMessage(
                        `"${category}" xarajati uchun to'lov miqdorini belgilang (UZS):`,
                        'select_amount'
                    );
                };

                const handleSelectExpenseAmountInChat = (amount) => {
                    chatEnteredExpenseAmount.value = amount;
                    expenseChatMessages.value.push({ sender: 'user', text: formatMoney(amount) });
                    
                    addExpenseBotMessage(
                        "To'lov qilingan usulni tanlang:",
                        'select_method'
                    );
                };

                const handleCustomExpenseAmountInChat = (amount) => {
                    if (!amount || amount <= 0) return;
                    chatEnteredExpenseAmount.value = amount;
                    expenseChatMessages.value.push({ sender: 'user', text: formatMoney(amount) });
                    chatCustomExpenseInput.value = false;
                    
                    addExpenseBotMessage(
                        "To'lov qilingan usulni tanlang:",
                        'select_method'
                    );
                };

                const handleSelectExpenseMethodInChat = (method) => {
                    chatSelectedExpenseMethod.value = method;
                    expenseChatMessages.value.push({ sender: 'user', text: method });
                    
                    addExpenseBotMessage(
                        `Ma'lumotlar to'g'ri kiritildimi?\nChiqim sababi: ${chatSelectedExpenseCategory.value}\nMiqdori: ${formatMoney(chatEnteredExpenseAmount.value)}\nUsuli: ${method}\n\nTo'lovni kassa chiqimlariga qo'shish uchun pastdagi tugmani bosing:`,
                        'confirm'
                    );
                };

                const handleConfirmExpenseInChat = () => {
                    financeTransactionsList.value.unshift({
                        id: financeTransactionsList.value.length + 1,
                        type: 'chiqim',
                        category: `${chatSelectedExpenseCategory.value} (${chatSelectedExpenseMethod.value})`,
                        amount: chatEnteredExpenseAmount.value,
                        date: new Date().toISOString().replace('T', ' ').substring(0, 16)
                    });
                    
                    expenseChatMessages.value.push({ sender: 'user', text: "Chiqimni tasdiqlash" });
                    
                    addExpenseBotMessage(
                        `🎉 Chiqim muvaffaqiyatli ro'yxatga olindi! "${chatSelectedExpenseCategory.value}" uchun ${formatMoney(chatEnteredExpenseAmount.value)} chiqim hisoblandi va kassa balansidan ayirildi.`,
                        'success'
                    );
                };

                // School Profit Chat Bot functions
                const openProfitChat = () => {
                    showProfitChat.value = true;
                    
                    profitChatMessages.value = [
                        {
                            sender: 'bot',
                            text: "Salom! Men Avtotest Sof Foyda Tahlilchisiman. Maktabimizning moliyaviy balansi tahlilini ko'rishni istaysizmi yoki foydani ko'paytirish bo'yicha tavsiyalarni olasizmi?",
                            type: 'start'
                        }
                    ];
                    
                    nextTick(() => {
                        const chatBody = document.getElementById('profit-chat-body');
                        if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
                    });
                };

                const addProfitBotMessage = (text, type = 'text', delay = 800) => {
                    isProfitChatTyping.value = true;
                    setTimeout(() => {
                        isProfitChatTyping.value = false;
                        profitChatMessages.value.push({ sender: 'bot', text, type });
                        
                        nextTick(() => {
                            const chatBody = document.getElementById('profit-chat-body');
                            if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;
                        });
                    }, delay);
                };

                const handleViewProfitAnalysis = () => {
                    profitChatMessages.value.push({ sender: 'user', text: "📊 Moliyaviy tahlil" });
                    
                    const kirim = financeSummary.value.kirim;
                    const chiqim = financeSummary.value.chiqim;
                    const profit = financeSummary.value.profit;
                    
                    let statusText = "";
                    if (profit < 0) {
                        statusText = `🔴 Holat: Maktab hozirda zarar ko'rmoqda. Balansni tiklash uchun kirimlarni oshirish (masalan, o'quvchilar to'lovlarini undirish) yoki chiqimlarni qisqartirish talab etiladi.`;
                    } else {
                        statusText = `🟢 Holat: Tabriklaymiz! Maktab ijobiy balansda ishlamoqda. Sof foydangiz barqaror ravishda o'smoqda.`;
                    }

                    const reportText = `Maktabimizning joriy moliyaviy hisoboti:\n\n` +
                        `🟢 Jami Kirim: ${formatMoney(kirim)}\n` +
                        `🔴 Jami Chiqim: ${formatMoney(chiqim)}\n` +
                        `⚖️ Sof Foyda: ${formatMoney(profit)}\n\n` +
                        `${statusText}`;

                    addProfitBotMessage(reportText, 'options');
                };

                const handleViewProfitTips = () => {
                    profitChatMessages.value.push({ sender: 'user', text: "💡 Foydani oshirish bo'yicha tavsiyalar" });
                    
                    const pendingStudents = studentsList.value.filter(s => s.tuition_status === 'Kutilmoqda');
                    let studentTip = "";
                    if (pendingStudents.length > 0) {
                        studentTip = `\n• Hozirda to'lov qilishi kutilayotgan ${pendingStudents.length} ta o'quvchi bor (masalan, ${pendingStudents.map(s => s.name).join(', ')}). Ularning to'lovlarini faollashtirish kassa balansini darhol oshiradi.`;
                    } else {
                        studentTip = `\n• Barcha o'quvchilar to'lovlarini to'lashgan. Yangi o'quvchilarni jalb qilishni rejalashtirish lozim.`;
                    }

                    const tipsText = `Foydani ko'paytirish uchun quyidagi choralar tavsiya etiladi:\n` +
                        `${studentTip}\n` +
                        `• **O'qituvchilar modelini tekshirish:** Percentage (foizli) maosh tizimidan foydalanib xarajatlarni o'quvchilar soniga mutanosib qiling.\n` +
                        `• **Tashqi xarajatlarni boshqarish:** Ofis ijarasi va kommunal xarajatlarni tejash choralarini ko'ring.\n` +
                        `• **Hamkorlar komissiyasi:** Hamkorlik shartnomalaridan tushadigan kirimlarni kengaytiring.`;

                    addProfitBotMessage(tipsText, 'options');
                };

                const handleViewFormulaHelp = () => {
                    profitChatMessages.value.push({ sender: 'user', text: "❓ Tushuntirish (Formula)" });
                    
                    const formulaText = `Sof Foyda (Net Profit) qanday hisoblanadi?\n\n` +
                        `Formulasi:\nSof Foyda = Jami Kirim - Jami Chiqim\n\n` +
                        `• **Jami Kirim:** O'quvchilardan olingan to'lovlar hamda hamkorlik tushumlari yig'indisi.\n` +
                        `• **Jami Chiqim:** Xodimlarning oylik maoshlari hamda ofis/kommunal xarajatlar yig'indisi.`;

                    addProfitBotMessage(formulaText, 'options');
                };

                // Calculate average grade
                const calculateAverageGrade = (grades) => {
                    if (!grades || grades.length === 0) return '0.0';
                    const sum = grades.reduce((a, b) => a + b, 0);
                    return (sum / grades.length).toFixed(1);
                };

                const handleLogin = () => {
                    authError.value = '';
                    if (!authUsername.value || !authPassword.value) {
                        authError.value = "Login va parolni kiriting!";
                        return;
                    }

                    if (authUsername.value.toLowerCase().trim() === adminUsernameSetting.value.toLowerCase().trim() && authPassword.value === adminPasswordSetting.value) {
                        isLoggedIn.value = true;
                        loggedInUserType.value = 'admin';
                        isAdminMode.value = true;
                        activeAdminTab.value = 'dashboard';
                        return;
                    }

                    // Check if it's a teacher login
                    const teacher = staffList.value.find(
                        t => t.login && String(t.login).toLowerCase().trim() === authUsername.value.toLowerCase().trim() && String(t.password).trim() === String(authPassword.value).trim()
                    );

                    if (teacher) {
                        isLoggedIn.value = true;
                        loggedInUserType.value = 'teacher';
                        loggedInTeacherId.value = teacher.id;
                        isAdminMode.value = false;
                        activeTeacherTab.value = 'students';
                        selectedFeedbackStudentId.value = studentsList.value.length ? studentsList.value[0].id : null;
                        return;
                    }

                    const student = studentsList.value.find(
                        s => s.login && String(s.login).toLowerCase().trim() === authUsername.value.toLowerCase().trim() && String(s.password).trim() === String(authPassword.value).trim()
                    );

                    if (student) {
                        isLoggedIn.value = true;
                        loggedInUserType.value = 'student';
                        loggedInStudentId.value = student.id;
                        selectedStudentId.value = student.id;
                        isAdminMode.value = false;
                        isTestStarted.value = false;
                        activeStudentTab.value = 'dashboard';

                        // Record login activity log
                        const now = new Date();
                        const timeStr = now.toISOString().replace('T', ' ').substring(0, 16);
                        
                        studentActivityLogs.value.forEach(log => {
                            if (log.student_id === student.id && log.logout_time === "Ayni vaqtda faol") {
                                log.logout_time = timeStr;
                            }
                        });

                        const newLog = {
                            id: studentActivityLogs.value.length + 1,
                            student_id: student.id,
                            login_time: timeStr,
                            logout_time: "Ayni vaqtda faol"
                        };
                        studentActivityLogs.value.unshift(newLog);
                        localStorage.setItem('student_activity_logs', JSON.stringify(studentActivityLogs.value));

                        // Check subscription status - if not active, pop up payment assistant!
                        if (getStudentSubscriptionStatus(student) !== 'Faol') {
                            openPaymentChatForCurrentStudent(student.id);
                        }
                        return;
                    }

                    authError.value = "Login yoki parol noto'g'ri!";
                };

                const handleStudentPanelUnlock = () => {
                    authError.value = '';
                    if (!studentPanelUnlockPassword.value) {
                        authError.value = "Parolni kiriting!";
                        return;
                    }

                    if (studentPanelUnlockPassword.value === studentPanelPasswordSetting.value) {
                        isLoggedIn.value = true;
                        loggedInUserType.value = 'student_panel';
                        loggedInStudentId.value = null;
                        selectedStudentId.value = null;
                        studentSelectPassword.value = '';
                        studentSelectError.value = '';
                        isAdminMode.value = false;
                        studentPanelUnlockPassword.value = '';
                        return;
                    }

                    authError.value = "Kiritilgan o'quvchi tizimi paroli noto'g'ri!";
                };

                const handleLogout = () => {
                    try {
                        const studentId = loggedInStudentId.value || selectedStudentId.value;
                        if (studentId && loggedInUserType.value === 'student' && studentActivityLogs.value) {
                            const now = new Date();
                            const timeStr = now.toISOString().replace('T', ' ').substring(0, 16);
                            
                            const activeLog = studentActivityLogs.value.find(log => log.student_id === studentId && log.logout_time === "Ayni vaqtda faol");
                            if (activeLog) {
                                activeLog.logout_time = timeStr;
                                localStorage.setItem('student_activity_logs', JSON.stringify(studentActivityLogs.value));
                            }
                        }
                    } catch (e) {
                        console.warn("Activity log update error:", e);
                    }

                    try {
                        if (window.speechSynthesis) {
                            window.speechSynthesis.cancel();
                        }
                    } catch (e) {
                        console.warn("Speech cancel error:", e);
                    }

                    try {
                        if (typeof timerInterval !== 'undefined' && timerInterval) {
                            clearInterval(timerInterval);
                            timerInterval = null;
                        }
                    } catch (e) {
                        console.warn("Timer clear error:", e);
                    }
                    
                    isLoggedIn.value = false;
                    loggedInUserType.value = '';
                    loggedInStudentId.value = null;
                    selectedStudentId.value = null;
                    authUsername.value = '';
                    authPassword.value = '';
                    authError.value = '';
                    isAdminMode.value = false;
                    isTestStarted.value = false;
                    testFinished.value = false;
                    userAnswers.value = {};
                    studentPanelUnlockPassword.value = '';
                    studentSelectPassword.value = '';
                    studentSelectError.value = '';
                };

                const triggerAdminPanelToggle = () => {
                    isAdminMode.value = !isAdminMode.value;
                    if (!isAdminMode.value) {
                        activeStudentTab.value = 'tests';
                        isTestStarted.value = false;
                        if (!selectedStudentId.value && studentsList.value && studentsList.value.length) {
                            selectedStudentId.value = studentsList.value[0].id;
                        }
                    }
                };

                const confirmAdminVerify = () => {
                    if (adminVerifyPasswordInput.value === adminPasswordSetting.value) {
                        isAdminMode.value = true;
                        showAdminVerifyModal.value = false;
                    } else {
                        adminVerifyError.value = "Noto'g'ri maxfiy parol!";
                    }
                };

                const registerNewStudentByManager = () => {
                    if (!newStudent.value.name || !newStudent.value.login || !newStudent.value.password) {
                        alert("Barcha maydonlarni to'ldiring!");
                        return;
                    }
                    
                    const nextId = studentsList.value.length ? Math.max(...studentsList.value.map(s => s.id)) + 1 : 1;
                    
                    const studentObj = {
                        id: nextId,
                        name: newStudent.value.name,
                        class_name: newStudent.value.class_name,
                        today_status: 'keldi',
                        grades: [],
                        tuition_status: 'Kutilmoqda',
                        subscription_end_date: newStudent.value.subscription_end_date || getDefaultEndDate(),
                        login: newStudent.value.login.toLowerCase().trim(),
                        password: newStudent.value.password
                    };
                    
                    studentsList.value.push(studentObj);
                    
                    // Log
                    const now = new Date();
                    const timeStr = now.toTimeString().split(' ')[0].substring(0, 5);
                    managerLogs.value.unshift({
                        time: timeStr,
                        action: `O'quvchi qo'shildi: ${studentObj.name} (${studentObj.login})`
                    });
                    
                    // Reset
                    newStudent.value = { name: '', class_name: 'A-10', login: '', password: '', subscription_end_date: getDefaultEndDate() };
                    alert("O'quvchi muvaffaqiyatli ro'yxatga olindi!");
                };

                const addNewClassByManager = () => {
                    if (!newClass.value.name || !newClass.value.type) {
                        alert("Guruh kodi va kategoriyani kiriting!");
                        return;
                    }
                    
                    classesList.value.push({
                        name: newClass.value.name.toUpperCase().trim(),
                        type: newClass.value.type
                    });
                    
                    // Log
                    const now = new Date();
                    const timeStr = now.toTimeString().split(' ')[0].substring(0, 5);
                    managerLogs.value.unshift({
                        time: timeStr,
                        action: `Yangi guruh yaratildi: ${newClass.value.name.toUpperCase().trim()}`
                    });
                    
                    // Reset
                    newClass.value = { name: '', type: '' };
                    showAddClassForm.value = false;
                    alert("Yangi guruh muvaffaqiyatli qo'shildi!");
                };

                const getStudentSubscriptionStatus = (student) => {
                    if (!student || !student.subscription_end_date) return 'Muddati tugagan';
                    if (student.tuition_status === 'Kutilmoqda') return 'Muddati tugagan';
                    const endDate = new Date(student.subscription_end_date);
                    const todayDate = new Date('2026-07-08');
                    return endDate >= todayDate ? 'Faol' : 'Muddati tugagan';
                };

                const getStudentSubscriptionStatusById = (studentId) => {
                    const student = studentsList.value.find(s => s.id === studentId);
                    return getStudentSubscriptionStatus(student);
                };

                const renewStudentSubscription = (studentId) => {
                    const student = studentsList.value.find(s => s.id === studentId);
                    if (!student) return;

                    const today = new Date('2026-07-08');
                    let currentEndDate = new Date(student.subscription_end_date);
                    
                    if (isNaN(currentEndDate.getTime()) || currentEndDate < today) {
                        currentEndDate = today;
                    }
                    
                    currentEndDate.setDate(currentEndDate.getDate() + 30);
                    
                    const year = currentEndDate.getFullYear();
                    const month = String(currentEndDate.getMonth() + 1).padStart(2, '0');
                    const day = String(currentEndDate.getDate()).padStart(2, '0');
                    student.subscription_end_date = `${year}-${month}-${day}`;
                    student.tuition_status = "To'lagan";

                    // Record transaction
                    financeTransactionsList.value.unshift({
                        id: financeTransactionsList.value.length + 1,
                        type: 'kirim',
                        category: `Obuna yangilanishi (${student.name})`,
                        amount: 800000,
                        date: new Date().toISOString().replace('T', ' ').substring(0, 16)
                    });
                };

                const openPaymentChatForCurrentStudent = (studentId) => {
                    openPaymentChat();
                    const sId = studentId || loggedInStudentId.value || selectedStudentId.value;
                    if (sId) {
                        handleSelectStudentInChat(sId);
                    }
                };

                const handleObunaButtonClick = (studentId) => {
                    openPaymentChatForCurrentStudent(studentId);
                };

                const openAddQuestionModal = () => {
                    cancelEditQuestion();
                    showAddQuestionModal.value = true;
                };

                const startEditQuestion = (q) => {
                    editingQuestionId.value = q.id;
                    const uz = q.translations?.uz_lat || q.translations?.uz_cyr || {};
                    customQuestionText.value = uz.question || '';
                    const opts = uz.options || [];
                    customOptA.value = opts.find(o => o.id === 'a')?.text || opts[0]?.text || '';
                    customOptB.value = opts.find(o => o.id === 'b')?.text || opts[1]?.text || '';
                    customOptC.value = opts.find(o => o.id === 'c')?.text || opts[2]?.text || '';
                    customOptD.value = opts.find(o => o.id === 'd')?.text || (opts.length > 3 ? opts[3]?.text : '') || '';
                    customExplanation.value = uz.explanation || '';
                    customLevel.value = q.level || 1;
                    showAddQuestionForm.value = true;
                    showAddQuestionModal.value = true;
                };

                const cancelEditQuestion = () => {
                    editingQuestionId.value = null;
                    customQuestionText.value = '';
                    customOptA.value = '';
                    customOptB.value = '';
                    customOptC.value = '';
                    customOptD.value = '';
                    customExplanation.value = '';
                    customLevel.value = 1;
                    showAddQuestionModal.value = false;
                };

                const deleteQuestionFromDb = async (questionId) => {
                    if (!confirm(`#${questionId}-savolni ma'lumotlar bazasidan o'chirishni tasdiqlaysizmi?`)) {
                        return;
                    }
                    try {
                        const response = await fetch(`/api/v1/questions/${questionId}`, {
                            method: 'DELETE'
                        });
                        if (response.ok) {
                            adminQuestionsList.value = adminQuestionsList.value.filter(q => q.id !== questionId);
                            adminQuestionsCount.value = adminQuestionsList.value.length;
                            questions.value = questions.value.filter(q => q.id !== questionId);
                            alert("✅ Savol ma'lumotlar bazasidan o'chirildi.");
                        } else {
                            alert("Xatolik: Savol o'chirilmadi.");
                        }
                    } catch (err) {
                        console.error("Delete question error:", err);
                        alert("Server bilan bog'lanishda xatolik yuz berdi.");
                    }
                };

                const openExplanationModal = () => {
                    showExplanationModal.value = true;
                };

                const getCorrectOptionText = (q) => {
                    if (!q || !q.translations) return '';
                    const langData = q.translations[currentLang.value] || q.translations['uz_lat'];
                    if (!langData || !langData.options) return '';
                    const correctOpt = langData.options.find(o => o.id === q.correct_option_id);
                    return correctOpt ? correctOpt.text : (langData.options[0]?.text || '');
                };

                const handleSaveCustomQuestion = async () => {
                    if (!customQuestionText.value.trim() || !customOptA.value.trim() || !customOptB.value.trim() || !customOptC.value.trim()) {
                        alert("Iltimos, savol matni va kamida 3 ta variantni kiriting!");
                        return;
                    }

                    isSubmittingCustomQuestion.value = true;

                    const optionsList = [
                        { id: 'a', text: customOptA.value.trim() },
                        { id: 'b', text: customOptB.value.trim() },
                        { id: 'c', text: customOptC.value.trim() }
                    ];
                    if (customOptD.value && customOptD.value.trim()) {
                        optionsList.push({ id: 'd', text: customOptD.value.trim() });
                    }

                    const translations = {
                        uz_lat: {
                            question: customQuestionText.value.trim(),
                            options: optionsList,
                            explanation: customExplanation.value.trim() || "Ushbu savol YHQ qoidalariga muvofiq kiritildi."
                        },
                        uz_cyr: {
                            question: customQuestionText.value.trim(),
                            options: optionsList
                        },
                        ru: {
                            question: customQuestionText.value.trim(),
                            options: optionsList
                        },
                        en: {
                            question: customQuestionText.value.trim(),
                            options: optionsList
                        },
                        qr: {
                            question: customQuestionText.value.trim(),
                            options: optionsList
                        }
                    };

                    try {
                        if (editingQuestionId.value) {
                            // Update existing question
                            const response = await fetch(`/api/v1/questions/${editingQuestionId.value}`, {
                                method: 'PUT',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({
                                    translations,
                                    correct_option_id: 'a',
                                    level: customLevel.value
                                })
                            });

                            if (response.ok) {
                                const targetIdx = adminQuestionsList.value.findIndex(q => q.id === editingQuestionId.value);
                                if (targetIdx !== -1) {
                                    adminQuestionsList.value[targetIdx] = {
                                        id: editingQuestionId.value,
                                        translations,
                                        correct_option_id: 'a',
                                        level: customLevel.value
                                    };
                                }
                                alert("✅ Savol muvaffaqiyatli tahrirlandi va saqlandi!");
                                cancelEditQuestion();
                            } else {
                                alert("Xatolik yuz berdi, tahrirlanmadi.");
                            }
                        } else {
                            // Create new question
                            const response = await fetch('/api/v1/questions', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({
                                    translations,
                                    correct_option_id: 'a',
                                    level: customLevel.value
                                })
                            });

                            const resData = await response.json();
                            if (response.ok && resData.data) {
                                const newQ = resData.data;
                                questions.value.push(newQ);
                                adminQuestionsList.value.unshift(newQ);
                                adminQuestionsCount.value++;
                                questionSortOrder.value = 'desc';
                                questionCurrentPage.value = 1;
                                searchQuestionQuery.value = '';
                                filterQuestionLevel.value = 'all';
                                showAddQuestionModal.value = false;
                                alert(`🎉 #${newQ.id}-savol ma'lumotlar bazasiga muvaffaqiyatli saqlandi va jadvalning 1-sahifasi eng yuqorisiga joylashtirildi!`);
                                cancelEditQuestion();
                            } else {
                                alert("Xatolik: " + (resData.error || "Savol saqlanmadi"));
                            }
                        }
                    } catch (err) {
                        console.error("Save custom question error:", err);
                        alert("Server bilan bog'lanishda xatolik yuz berdi!");
                    } finally {
                        isSubmittingCustomQuestion.value = false;
                    }
                };

                // Computed finance summaries
                const financeSummary = computed(() => {
                    // Calculate total income from transactions (no double counting)
                    const kirim = financeTransactionsList.value
                        .filter(t => t.type === 'kirim')
                        .reduce((sum, t) => sum + t.amount, 0);

                    // Calculate total expenses from actual transactions (no automatic salary subtraction)
                    const chiqim = financeTransactionsList.value
                        .filter(t => t.type === 'chiqim')
                        .reduce((sum, t) => sum + t.amount, 0);

                    const profit = kirim - chiqim;

                    return { kirim, chiqim, profit };
                });

                // Attendance computed values to avoid complex expressions in HTML bindings
                const todayAttendancePercentage = computed(() => {
                    if (studentsList.value.length === 0) return 0;
                    const present = studentsList.value.filter(s => s.today_status === 'keldi').length;
                    return Math.round((present / studentsList.value.length) * 100);
                });

                const todayPresentCount = computed(() => {
                    return studentsList.value.filter(s => s.today_status === 'keldi').length;
                });

                const todayAbsentCount = computed(() => {
                    return studentsList.value.filter(s => s.today_status === 'kelmadi').length;
                });

                const getResultStatusText = (scoreValue) => {
                    return scoreValue === 20 ? "IMTIHONDAN O'TDINGIZ! (20/20)" : "IMTIHONDAN O'TMADINGIZ! (20 ta to'g'ri bo'lishi shart)";
                };

                const getAnswerStatusText = (q, ans) => {
                    if (ans === undefined) return 'JAVOB BERILMAGAN';
                    return ans === q.correct_option_id ? "TO'G'RI" : "XATO";
                };

                const getTranslation = (q, lang) => {
                    if (!q || !q.translations) return { question: '', options: [] };
                    return q.translations[lang] || q.translations['uz_lat'] || { question: '', options: [] };
                };

                // State Syncing System
                const isSyncing = ref(false);

                let lastStateVersion = 0;
                let syncInterval = null;

                const pushStateToServer = async () => {
                    if (isSyncing.value) return;
                    try {
                        const payload = {
                            students_list: studentsList.value,
                            staff_list: staffList.value,
                            classes_list: classesList.value,
                            partners_list: partnersList.value,
                            finance_transactions_list: financeTransactionsList.value,
                            attempts_list: studentTestAttemptsList.value,
                            student_attendance_list: studentAttendanceList.value,
                            student_feedback_list: studentFeedbackList.value,
                            student_activity_logs: studentActivityLogs.value,
                            student_penalties_list: studentPenaltiesList.value
                        };
                        const res = await fetch('/api/v1/sync-state', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify(payload)
                        });
                        const serverState = await res.json();
                        if (serverState && serverState._version) {
                            lastStateVersion = serverState._version;
                        }
                    } catch (err) {
                        console.error("Push state failed:", err);
                    }
                };

                const pullStateFromServer = async () => {
                    try {
                        const url = lastStateVersion ? `/api/v1/sync-state?v=${lastStateVersion}` : '/api/v1/sync-state';
                        const res = await fetch(url);
                        const serverState = await res.json();
                        
                        if (serverState.unchanged) {
                            return;
                        }
                        
                        if (serverState._version) {
                            lastStateVersion = serverState._version;
                        }
                        
                        isSyncing.value = true;
                        
                        const updateIfDiff = (targetRef, serverArr, storageKey) => {
                            if (serverArr && Array.isArray(serverArr) && serverArr.length > 0) {
                                if (JSON.stringify(targetRef.value) !== JSON.stringify(serverArr)) {
                                    targetRef.value = serverArr;
                                    localStorage.setItem(storageKey, JSON.stringify(serverArr));
                                }
                            }
                        };
                        
                        updateIfDiff(studentsList, serverState.students_list, 'students_list');
                        updateIfDiff(staffList, serverState.staff_list, 'staff_list');
                        updateIfDiff(classesList, serverState.classes_list, 'classes_list');
                        updateIfDiff(partnersList, serverState.partners_list, 'partners_list');
                        updateIfDiff(financeTransactionsList, serverState.finance_transactions_list, 'finance_transactions_list');
                        updateIfDiff(studentTestAttemptsList, serverState.attempts_list, 'attempts_list');
                        updateIfDiff(studentAttendanceList, serverState.student_attendance_list, 'student_attendance_list');
                        updateIfDiff(studentFeedbackList, serverState.student_feedback_list, 'student_feedback_list');
                        updateIfDiff(studentActivityLogs, serverState.student_activity_logs, 'student_activity_logs');
                        updateIfDiff(studentPenaltiesList, serverState.student_penalties_list, 'student_penalties_list');
                        
                        setTimeout(() => {
                            isSyncing.value = false;
                        }, 250);
                    } catch (err) {
                        setTimeout(() => {
                            isSyncing.value = false;
                        }, 250);
                    }
                };

                const triggerPushState = () => {
                    if (isSyncing.value) return;
                    pushStateToServer();
                };

                // LocalStorage sync watchers
                watch(activeAdminTab, (newVal) => {
                    if (newVal === 'savollar') {
                        loadAllQuestionsForAdmin();
                    }
                });

                watch(studentsList, (newVal) => {
                    localStorage.setItem('students_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                watch(studentTestAttemptsList, (newVal) => {
                    localStorage.setItem('attempts_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                watch(classesList, (newVal) => {
                    localStorage.setItem('classes_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                watch(partnersList, (newVal) => {
                    localStorage.setItem('partners_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                watch(financeTransactionsList, (newVal) => {
                    localStorage.setItem('finance_transactions_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                watch(staffList, (newVal) => {
                    localStorage.setItem('staff_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                watch(studentFeedbackList, (newVal) => {
                    localStorage.setItem('student_feedback_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                const submitFeedbackFromTeacher = () => {
                    if (!selectedFeedbackStudentId.value || !newFeedbackMessage.value.trim()) {
                        alert("Iltimos, o'quvchini tanlang va tavsiya matnini kiriting!");
                        return;
                    }
                    const teacher = staffList.value.find(t => t.id === loggedInTeacherId.value);
                    const teacherName = teacher ? teacher.name : "O'qituvchi";
                    
                    const newFeedback = {
                        id: studentFeedbackList.value.length ? Math.max(...studentFeedbackList.value.map(f => f.id)) + 1 : 1,
                        student_id: selectedFeedbackStudentId.value,
                        teacher_name: teacherName,
                        message: newFeedbackMessage.value.trim(),
                        date: new Date().toISOString().replace('T', ' ').substring(0, 16)
                    };
                    
                    studentFeedbackList.value.unshift(newFeedback);
                    newFeedbackMessage.value = '';
                    alert("Tavsiya o'quvchiga muvaffaqiyatli yuborildi!");
                };

                const deleteFeedbackByTeacher = (feedbackId) => {
                    if (confirm("Ushbu tavsiyani o'chirmoqchimisiz?")) {
                        studentFeedbackList.value = studentFeedbackList.value.filter(f => f.id !== feedbackId);
                    }
                };

                const selectedLessonId = ref(null);
                const showQrModal = ref(false);
                const showMobileAccessModal = ref(false);
                const mobileAccessMode = ref('online');
                const isRefreshingMobileUrls = ref(false);
                const serverLocalIp = ref('');
                const serverLocaltunnelUrl = ref('');

                const refreshMobileUrls = async () => {
                    isRefreshingMobileUrls.value = true;
                    try {
                        const resIp = await fetch('/api/v1/local-ip');
                        const dataIp = await resIp.json();
                        if (dataIp.ip) serverLocalIp.value = dataIp.ip;
                    } catch (err) {
                        console.error("Local IP fetch failed:", err);
                    }
                    try {
                        const resLt = await fetch('/api/v1/localtunnel-url');
                        const dataLt = await resLt.json();
                        if (dataLt.url) {
                            serverLocaltunnelUrl.value = dataLt.url;
                        }
                    } catch (err) {
                        console.error("Localtunnel URL fetch failed:", err);
                    }
                    setTimeout(() => {
                        isRefreshingMobileUrls.value = false;
                    }, 400);
                };

                const openMobileAccessModal = async () => {
                    showMobileAccessModal.value = true;
                    await refreshMobileUrls();
                };

                const currentMobileUrl = computed(() => {
                    if (mobileAccessMode.value === 'online' && serverLocaltunnelUrl.value) {
                        return serverLocaltunnelUrl.value;
                    }
                    if (serverLocalIp.value) {
                        return 'http://' + serverLocalIp.value + ':8000';
                    }
                    return window.location.origin;
                });

                const copyMobileUrl = async () => {
                    try {
                        if (navigator.clipboard) {
                            await navigator.clipboard.writeText(currentMobileUrl.value);
                            alert("📋 Havola nusxalandi: " + currentMobileUrl.value);
                        } else {
                            prompt("Ushbu havolani nusxalang:", currentMobileUrl.value);
                        }
                    } catch (e) {
                        prompt("Ushbu havolani nusxalang:", currentMobileUrl.value);
                    }
                };

                const currentStudent = computed(() => {
                    const id = loggedInStudentId.value || selectedStudentId.value;
                    return studentsList.value.find(s => s.id === id) || null;
                });

                const showPhotoSourceModal = ref(false);
                const isCameraActive = ref(false);
                let cameraStream = null;

                const openPhotoSourceModal = () => {
                    showPhotoSourceModal.value = true;
                };

                const closePhotoSourceModal = () => {
                    showPhotoSourceModal.value = false;
                    stopWebcam();
                };

                const startWebcam = async () => {
                    try {
                        isCameraActive.value = true;
                        const stream = await navigator.mediaDevices.getUserMedia({
                            video: { facingMode: 'user', width: { ideal: 640 }, height: { ideal: 480 } }
                        });
                        cameraStream = stream;
                        setTimeout(() => {
                            const video = document.getElementById('webcam-preview');
                            if (video) {
                                video.srcObject = stream;
                                video.onloadedmetadata = () => {
                                    video.play().catch(e => console.log("Webcam play block:", e));
                                };
                            }
                        }, 250);
                    } catch (err) {
                        console.error("Kameraga ulanishda xatolik:", err);
                        alert("Kamerani faollashtirib bo'lmadi. Kamera ruxsati berilganini yoki boshqa dastur band qilmaganini tekshiring.");
                        isCameraActive.value = false;
                    }
                };

                const stopWebcam = () => {
                    if (cameraStream) {
                        cameraStream.getTracks().forEach(track => track.stop());
                        cameraStream = null;
                    }
                    isCameraActive.value = false;
                };

                const capturePhoto = () => {
                    const video = document.getElementById('webcam-preview');
                    if (!video) return;

                    if (video.readyState < 2) {
                        alert("Kamera tasviri hali tayyor emas! Tasvir paydo bo'lguncha 1-2 soniya kuting.");
                        return;
                    }

                    const canvas = document.createElement('canvas');
                    canvas.width = video.videoWidth || 640;
                    canvas.height = video.videoHeight || 480;
                    const ctx = canvas.getContext('2d');
                    
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    
                    const dataUrl = canvas.toDataURL('image/jpeg', 0.85);
                    
                    const student = currentStudent.value;
                    if (student) {
                        student.profile_image = dataUrl;
                        localStorage.setItem('students_list', JSON.stringify(studentsList.value));
                        alert("Surat kamera orqali muvaffaqiyatli tushirildi!");
                    }
                    
                    closePhotoSourceModal();
                };

                const triggerNativeCamera = () => {
                    const input = document.getElementById('student-native-camera-input');
                    if (input) input.click();
                };

                const triggerPhotoUpload = () => {
                    const input = document.getElementById('student-photo-input');
                    if (input) input.click();
                };

                const uploadStudentPhoto = (event) => {
                    const file = event.target.files[0];
                    if (!file) return;
                    if (file.size > 2 * 1024 * 1024) {
                        alert("Rasm hajmi juda katta! Iltimos, 2MB dan kichik rasm yuklang.");
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const student = currentStudent.value;
                        if (student) {
                            student.profile_image = e.target.result;
                            localStorage.setItem('students_list', JSON.stringify(studentsList.value));
                            alert("Rasm muvaffaqiyatli yuklandi!");
                        }
                    };
                    reader.readAsDataURL(file);
                    closePhotoSourceModal();
                };

                const showPassportFull = ref(false);
                const showChangePasswordModal = ref(false);
                const newPasswordInput = ref('');
                const confirmPasswordInput = ref('');
                const passwordChangeSuccess = ref('');
                const passwordChangeError = ref('');

                const handleChangePassword = () => {
                    if (!newPasswordInput.value) {
                        passwordChangeError.value = 'Yangi parolni kiriting!';
                        return;
                    }
                    if (newPasswordInput.value !== confirmPasswordInput.value) {
                        passwordChangeError.value = 'Parollar bir xil emas!';
                        return;
                    }
                    if (currentStudent.value) {
                        currentStudent.value.password = newPasswordInput.value;
                        const idx = studentsList.value.findIndex(s => s.id === currentStudent.value.id);
                        if (idx !== -1) {
                            studentsList.value[idx].password = newPasswordInput.value;
                            localStorage.setItem('students_list', JSON.stringify(studentsList.value));
                        }
                    }
                    passwordChangeSuccess.value = 'Parol muvaffaqiyatli almashtirildi!';
                    passwordChangeError.value = '';
                    setTimeout(() => {
                        showChangePasswordModal.value = false;
                        newPasswordInput.value = '';
                        confirmPasswordInput.value = '';
                        passwordChangeSuccess.value = '';
                    }, 1200);
                };

                const lessonsListMock = [
                    { id: 1, title: "1-dars. Umumiy qoidalar", desc: "Haydovchilar, piyodalar va yo'lovchilarning umumiy majburiyatlari, asosiy tushunchalar hamda atamalar bo'yicha nazariy qo'llanma." },
                    { id: 2, title: "2-dars. Yo'l belgilari", desc: "Ogohlantiruvchi, imtiyozli, taqiqlovchi, buyuruvchi hamda axborot-ko'rsatkich yo'l belgilarining to'liq tahlili va talablari." },
                    { id: 3, title: "3-dars. Harakatlanish tartibi", desc: "Chorrahalardan o'tish tartibi, quvib o'tish qoidalari, to'xtash va to'xtab turish qoidalari hamda svetofor ishoralari." },
                    { id: 4, title: "4-dars. Dars jadvali va amaliyot", desc: "Avtomobilni boshqarish bo'yicha amaliy yo'riqnoma: pedal boshqaruvi, rulni to'g'ri ushlash va manevr qilish." },
                    { id: 5, title: "5-dars. Birinchi yordam", desc: "Yo'l-transport hodisasi sodir bo'lganda jabrlanuvchilarga birinchi tibbiy yordam ko'rsatish qoidalari va dori-darmonlarni qo'llash." }
                ];

                const studentPenaltiesList = ref(JSON.parse(localStorage.getItem('student_penalties_list')) || [
                    { id: 1, student_id: 1, title: "Nazariy darsga kechikish", amount: 25000, date: "2026-07-25", status: "To'lanmagan" },
                    { id: 2, student_id: 1, title: "Amaliyotda xavfsizlik kamarini taqmaslik", amount: 35000, date: "2026-07-28", status: "To'langan" },
                    { id: 3, student_id: 2, title: "Svetoforning taqiqlovchi ishorasida harakatlanish", amount: 50000, date: "2026-07-22", status: "To'lanmagan" },
                    { id: 4, student_id: 3, title: "Mashg'ulot qoidalarini buzish", amount: 20000, date: "2026-07-29", status: "To'langan" },
                    { id: 5, student_id: 6, title: "Mashq maydonida tezlikni oshirish", amount: 45000, date: "2026-07-30", status: "To'lanmagan" },
                    { id: 6, student_id: 7, title: "Nazariy topshiriq topshirmaslik", amount: 15000, date: "2026-07-31", status: "To'lanmagan" }
                ]);

                watch(studentPenaltiesList, (newVal) => {
                    localStorage.setItem('student_penalties_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                const payPenalty = (penaltyId) => {
                    const penalty = studentPenaltiesList.value.find(p => p.id === penaltyId);
                    if (penalty) {
                        penalty.status = "To'langan";
                        alert("Jarima muvaffaqiyatli to'landi!");
                    }
                };

                const studentAttendanceList = ref(JSON.parse(localStorage.getItem('student_attendance_list')) || [
                    { id: 1, student_id: 1, date: "2026-07-28", topic: "Nazariya (Yo'l belgilari)", status: "Keldi" },
                    { id: 2, student_id: 1, date: "2026-07-26", topic: "Nazariya (Umumiy qoidalar)", status: "Keldi" },
                    { id: 3, student_id: 1, date: "2026-07-24", topic: "Amaliyot (Avtodrom)", status: "Kelmadi" },
                    { id: 4, student_id: 2, date: "2026-07-28", topic: "Nazariya (Yo'l belgilari)", status: "Keldi" },
                    { id: 5, student_id: 2, date: "2026-07-26", topic: "Nazariya (Umumiy qoidalar)", status: "Keldi" },
                    { id: 6, student_id: 3, date: "2026-07-28", topic: "Nazariya (Yo'l belgilari)", status: "Kelmadi" },
                    { id: 7, student_id: 3, date: "2026-07-26", topic: "Nazariya (Umumiy qoidalar)", status: "Keldi" }
                ]);

                watch(studentAttendanceList, (newVal) => {
                    localStorage.setItem('student_attendance_list', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                const getStudentAttendance = (studentId) => {
                    const logs = studentAttendanceList.value.filter(a => a.student_id === studentId);
                    if (logs.length > 0) return logs;
                    return [
                        { id: 100 + studentId, student_id: studentId, date: "2026-08-02", topic: "Nazariya (Harakatlanish tartibi)", status: "Keldi" },
                        { id: 200 + studentId, student_id: studentId, date: "2026-07-31", topic: "Nazariya (Yo'l belgilari)", status: "Keldi" },
                        { id: 300 + studentId, student_id: studentId, date: "2026-07-29", topic: "Amaliyot (Pedal boshqaruvi)", status: "Keldi" }
                    ];
                };

                const confirmQrAttendanceSim = () => {
                    const student = currentStudent.value;
                    if (!student) return;
                    
                    const todayStr = new Date().toISOString().split('T')[0];
                    
                    const hasToday = studentAttendanceList.value.some(
                        a => a.student_id === student.id && a.date === todayStr
                    );
                    
                    if (hasToday) {
                        alert("Siz bugungi dars uchun allaqachon davomatdan o'tgansiz! (Keldi)");
                        showQrModal.value = false;
                        return;
                    }
                    
                    const newAttendance = {
                        id: studentAttendanceList.value.length ? Math.max(...studentAttendanceList.value.map(a => a.id)) + 1 : 1,
                        student_id: student.id,
                        date: todayStr,
                        topic: "Nazariya (Yo'l harakati xavfsizligi)",
                        status: "Keldi"
                    };
                    
                    studentAttendanceList.value.unshift(newAttendance);
                    localStorage.setItem('student_attendance_list', JSON.stringify(studentAttendanceList.value));
                    
                    alert("🎉 QR-kod muvaffaqiyatli skanerlandi! Bugungi davomatingiz tasdiqlandi ('Keldi' deb yozildi).");
                    showQrModal.value = false;
                };

                const currentStudentAttendanceStats = computed(() => {
                    const student = currentStudent.value;
                    if (!student) return { total: 0, present: 0, absent: 0, percent: 0 };
                    
                    const logs = getStudentAttendance(student.id);
                    const total = logs.length;
                    const present = logs.filter(a => a.status === 'Keldi').length;
                    const absent = logs.filter(a => a.status === 'Kelmadi').length;
                    const percent = total > 0 ? Math.round((present / total) * 100) : 0;
                    
                    return { total, present, absent, percent };
                });

                const qrCodeUrl = computed(() => {
                    const student = currentStudent.value;
                    if (!student) return '';
                    let baseOrigin = window.location.origin;
                    if (serverLocaltunnelUrl.value) {
                        baseOrigin = serverLocaltunnelUrl.value;
                    } else if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
                        if (serverLocalIp.value) {
                            baseOrigin = 'http://' + serverLocalIp.value + ':8000';
                        }
                    }
                    return 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + encodeURIComponent(baseOrigin + '/?checkin=' + student.login);
                });

                const mobileAccessQrCodeUrl = computed(() => {
                    const urlToEncode = currentMobileUrl.value;
                    if (!urlToEncode) return '';
                    return 'https://api.qrserver.com/v1/create-qr-code/?size=260x260&data=' + encodeURIComponent(urlToEncode);
                });

                const studentActivityLogs = ref(JSON.parse(localStorage.getItem('student_activity_logs')) || [
                    { id: 1, student_id: 1, login_time: "2026-07-31 09:12", logout_time: "2026-07-31 11:30" },
                    { id: 2, student_id: 1, login_time: "2026-07-30 14:05", logout_time: "2026-07-30 16:00" },
                    { id: 3, student_id: 2, login_time: "2026-07-31 10:00", logout_time: "2026-07-31 12:15" }
                ]);

                watch(studentActivityLogs, (newVal) => {
                    localStorage.setItem('student_activity_logs', JSON.stringify(newVal));
                    triggerPushState();
                }, { deep: true });

                onMounted(async () => {
                    await pullStateFromServer();
                    loadAllQuestionsForAdmin();
                    syncSystemStudentToList();
                    const uniquePasswordsMap = {
                        // Teachers
                        'shavkat': 'Shv98',
                        'malika': 'Mlk47',
                        'jamshid': 'Jms62',
                        'nodira': 'Ndr39',
                        // Students
                        'alijon': 'Alj58',
                        'madina': 'Mdn73',
                        'sardor': 'Srd84',
                        'durdona': 'Drd16',
                        'javohir': 'Jvh30',
                        'shahzoda': 'Shz51',
                        'bekzod': 'Bkz43',
                        'nigora': 'Ngr92',
                        'otabek': 'Otb74',
                        'kamola': 'Kml36',
                        'jasur': 'Jsr88',
                        'nilufar': 'Nlf27'
                    };

                    // Auto expand default list to 12 mock students using local storage migration flag
                    if (!localStorage.getItem('students_expanded_v2')) {
                        const default12Students = [
                            { id: 1, name: 'Alijon Karimov', class_name: 'A-10', today_status: 'keldi', grades: [5, 4, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'alijon', password: 'Alj58' },
                            { id: 2, name: 'Madina Rustamova', class_name: 'A-10', today_status: 'keldi', grades: [4, 4, 3], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'madina', password: 'Mdn73' },
                            { id: 3, name: 'Sardorbek Olimov', class_name: 'B-12', today_status: 'kelmadi', grades: [5, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'sardor', password: 'Srd84' },
                            { id: 4, name: 'Durdona Hakimova', class_name: 'B-12', today_status: 'keldi', grades: [3, 4, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'durdona', password: 'Drd16' },
                            { id: 5, name: 'Javohir Toshpulatov', class_name: 'C-05', today_status: 'keldi', grades: [2, 3, 3], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'javohir', password: 'Jvh30' },
                            { id: 6, name: 'Shahzoda Yusupova', class_name: 'A-10', today_status: 'keldi', grades: [5, 5, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'shahzoda', password: 'Shz51' },
                            { id: 7, name: 'Bekzod Nematov', class_name: 'B-12', today_status: 'keldi', grades: [4, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'bekzod', password: 'Bkz43' },
                            { id: 8, name: 'Nigora Salaydinova', class_name: 'C-05', today_status: 'keldi', grades: [3, 3, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'nigora', password: 'Ngr92' },
                            { id: 9, name: 'Otabek Sobirov', class_name: 'A-10', today_status: 'kelmadi', grades: [4, 4, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'otabek', password: 'Otb74' },
                            { id: 10, name: 'Kamola Tursunova', class_name: 'B-12', today_status: 'keldi', grades: [5, 4, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'kamola', password: 'Kml36' },
                            { id: 11, name: 'Jasur Alimov', class_name: 'C-05', today_status: 'keldi', grades: [4, 3, 3], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'jasur', password: 'Jsr88' },
                            { id: 12, name: 'Nilufar Qodirova', class_name: 'A-10', today_status: 'keldi', grades: [5, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-30', login: 'nilufar', password: 'Nlf27' }
                        ];

                        const customStudents = studentsList.value.filter(s => s.id > 12);
                        studentsList.value = [...default12Students, ...customStudents];
                        localStorage.setItem('students_list', JSON.stringify(studentsList.value));
                        localStorage.setItem('students_expanded_v2', 'true');
                    }

                    // Migrate student passwords to unique format if they are defaults or simple
                    studentsList.value.forEach(s => {
                        const defaultPwd = uniquePasswordsMap[s.login];
                        if (defaultPwd && (s.password === '123' || s.password === '12345' || s.password.includes('_avto#2026') || s.password.includes('Safe#') || s.password.includes('Road$') || s.password.includes('Rules@') || s.password.includes('Class!') || s.password.includes('Sign#'))) {
                            s.password = defaultPwd;
                        }
                    });
                    localStorage.setItem('students_list', JSON.stringify(studentsList.value));

                    // Migrate staff/teacher passwords to unique format if they are defaults or simple
                    staffList.value.forEach(t => {
                        const defaultPwd = uniquePasswordsMap[t.login];
                        if (defaultPwd && (t.password === '123' || t.password === '12345' || t.password.includes('_avto#2026') || t.password.includes('Avto#') || t.password.includes('Test$') || t.password.includes('Drive@') || t.password.includes('Kassa!'))) {
                            t.password = defaultPwd;
                        }
                    });
                    localStorage.setItem('staff_list', JSON.stringify(staffList.value));

                    authUsername.value = '';
                    authPassword.value = '';
                    await loadQuestions();

                    try {
                        const resIp = await fetch('/api/v1/local-ip');
                        const dataIp = await resIp.json();
                        serverLocalIp.value = dataIp.ip;
                    } catch (err) {
                        console.error("Local IP fetch failed:", err);
                        serverLocalIp.value = window.location.hostname;
                    }

                    try {
                        const resLt = await fetch('/api/v1/localtunnel-url');
                        const dataLt = await resLt.json();
                        if (dataLt.url) {
                            serverLocaltunnelUrl.value = dataLt.url;
                        }
                    } catch (err) {
                        console.error("Localtunnel URL fetch failed:", err);
                    }

                    // Background Real-Time Polling every 2 seconds for live sync across all devices
                    if (syncInterval) clearInterval(syncInterval);
                    syncInterval = setInterval(() => {
                        pullStateFromServer();
                    }, 2000);

                    // Sync when page tab becomes active
                    document.addEventListener('visibilitychange', () => {
                        if (document.visibilityState === 'visible') {
                            pullStateFromServer();
                        }
                    });
                    window.addEventListener('focus', () => {
                        pullStateFromServer();
                    });

                    // Check for URL check-in parameter from scanned QR code
                    const urlParams = new URLSearchParams(window.location.search);
                    const checkinLogin = urlParams.get('checkin');
                    if (checkinLogin) {
                        const student = studentsList.value.find(s => s.login === checkinLogin.toLowerCase().trim());
                        if (student) {
                            const todayStr = new Date().toISOString().split('T')[0];
                            const hasToday = studentAttendanceList.value.some(
                                a => a.student_id === student.id && a.date === todayStr
                            );
                            if (!hasToday) {
                                const newAttendance = {
                                    id: studentAttendanceList.value.length ? Math.max(...studentAttendanceList.value.map(a => a.id)) + 1 : 1,
                                    student_id: student.id,
                                    date: todayStr,
                                    topic: "Nazariya (Yo'l harakati xavfsizligi)",
                                    status: "Keldi"
                                };
                                studentAttendanceList.value.unshift(newAttendance);
                                localStorage.setItem('student_attendance_list', JSON.stringify(studentAttendanceList.value));
                                alert(`🎉 QR skanerlandi! ${student.name} uchun bugungi davomat muvaffaqiyatli tasdiqlandi ('Keldi' deb yozildi).`);
                            } else {
                                alert(`${student.name} bugungi darsga allaqachon davomatdan o'tgan.`);
                            }
                            // Clean parameters
                            const cleanUrl = window.location.origin + window.location.pathname;
                            window.history.replaceState({}, document.title, cleanUrl);
                        }
                    }
                });

                onUnmounted(() => {
                    if (syncInterval) clearInterval(syncInterval);
                });

                return {
                    confirmQrAttendanceSim,
                    currentStudentAttendanceStats,
                    studentAttendanceList,
                    getStudentAttendance,
                    studentActivityLogs,
                    studentPenaltiesList,
                    payPenalty,
                    triggerNativeCamera,
                    showPhotoSourceModal,
                    isCameraActive,
                    openPhotoSourceModal,
                    closePhotoSourceModal,
                    startWebcam,
                    stopWebcam,
                    capturePhoto,
                    activeStudentTab,
                    selectedLessonId,
                    showQrModal,
                    qrCodeUrl,
                    showMobileAccessModal,
                    openMobileAccessModal,
                    mobileAccessMode,
                    isRefreshingMobileUrls,
                    refreshMobileUrls,
                    currentMobileUrl,
                    copyMobileUrl,
                    serverLocalIp,
                    mobileAccessQrCodeUrl,
                    currentStudent,
                    triggerPhotoUpload,
                    uploadStudentPhoto,
                    lessonsListMock,
                    studentFeedbackList,
                    loggedInTeacherId,
                    activeTeacherTab,
                    selectedFeedbackStudentId,
                    newFeedbackMessage,
                    submitFeedbackFromTeacher,
                    deleteFeedbackByTeacher,
                    questions,
                    adminQuestionsList,
                    adminQuestionsCount,
                    loadAllQuestionsForAdmin,
                    currentLevel,
                    currentQuestionIndex,
                    currentQuestion,
                    currentQuestionData,
                    currentQuestionId,
                    currentCorrectOptionId,
                    currentLang,
                    isDarkMode,
                    userAnswers,
                    loading,
                    formattedTime,
                    dashOffset,
                    setLanguage,
                    t,
                    tStatus,
                    studentStartDate,
                    studentEndDate,
                    selectOption,
                    readQuestionAloud,
                    gotoQuestion,
                    nextQuestion,
                    prevQuestion,
                    finishTest,
                    testFinished,
                    score,
                    resetTest,
                    confirmAndResetTest,
                    getQuestionIllustration,
                    reviewFilter,
                    filteredReviewQuestions,
                    isAdminMode,
                    activeAdminTab,
                    activeStudentSubTab,
                    showAddPartnerForm,
                    newPartner,
                    partnersList,
                    studentsList,
                    classesList,
                    staffList,
                    financeTransactionsList,
                    calculateTeacherSalary,
                    formatMoney,
                    addPartner,
                    addStudentGrade,
                    deleteStudentGrade,
                    calculateAverageGrade,
                    financeSummary,
                    todayAttendancePercentage,
                    todayPresentCount,
                    todayAbsentCount,
                    isTestStarted,
                    startActualTest,
                    getResultStatusText,
                    getAnswerStatusText,
                    getTranslation,
                    audioMessage,
                    speakExplanation,
                    showPaymentChat,
                    chatMessages,
                    isChatTyping,
                    chatSelectedStudentId,
                    chatEnteredAmount,
                    chatSelectedPaymentMethod,
                    chatCustomAmountInput,
                    chatCustomAmountVal,
                    openPaymentChat,
                    handleSelectStudentInChat,
                    handleSelectAmountInChat,
                    handleCustomAmountInChat,
                    handleSelectMethodInChat,
                    handleConfirmPaymentInChat,
                    showExpenseChat,
                    expenseChatMessages,
                    isExpenseChatTyping,
                    chatSelectedExpenseCategory,
                    chatEnteredExpenseAmount,
                    chatSelectedExpenseMethod,
                    chatCustomExpenseInput,
                    chatCustomExpenseVal,
                    chatCustomCategoryVal,
                    chatCustomCategoryInput,
                    openExpenseChat,
                    handleViewReportInChat,
                    handleStartNewExpenseInChat,
                    handleSelectCategoryInChat,
                    handleCustomCategoryInChat,
                    handleSelectExpenseAmountInChat,
                    handleCustomExpenseAmountInChat,
                    handleSelectExpenseMethodInChat,
                    handleConfirmExpenseInChat,
                    showProfitChat,
                    profitChatMessages,
                    isProfitChatTyping,
                    openProfitChat,
                    handleViewProfitAnalysis,
                    handleViewProfitTips,
                    handleViewFormulaHelp,
                    selectedStudentId,
                    getStudentSubscriptionStatus,
                    getStudentSubscriptionStatusById,
                    renewStudentSubscription,
                    handleObunaButtonClick,
                    isLoggedIn,
                    loggedInUserType,
                    loggedInStudentId,
                    authUsername,
                    authPassword,
                    authError,
                    adminUsernameSetting,
                    adminPasswordSetting,
                    showAdminVerifyModal,
                    adminVerifyPasswordInput,
                    adminVerifyError,
                    triggerAdminPanelToggle,
                    confirmAdminVerify,
                    newStudent,
                    showAddClassForm,
                    newClass,
                    managerLogs,
                    registerNewStudentByManager,
                    addNewClassByManager,
                    selectedReportStudentId,
                    studentTestAttemptsList,
                    filteredAttempts,
                    getAverageScoreForStudent,
                    getAverageScoreClassForStudent,
                    loginTab,
                    studentPanelUnlockPassword,
                    studentSelectPassword,
                    studentSelectError,
                    studentPanelNameSetting,
                    studentPanelUsernameSetting,
                    studentPanelPasswordSetting,
                    serverLocaltunnelUrl,
                    saveSystemSettings,
                    handleStudentPanelUnlock,
                    handleLogin,
                    handleLogout,
                    triggerAdminPanelToggle,
                    showAddQuestionModal,
                    showAddQuestionForm,
                    editingQuestionId,
                    customQuestionText,
                    customOptA,
                    customOptB,
                    customOptC,
                    customOptD,
                    customExplanation,
                    customLevel,
                    isSubmittingCustomQuestion,
                    showExplanationModal,
                    openAddQuestionModal,
                    openExplanationModal,
                    searchQuestionQuery,
                    filterQuestionLevel,
                    questionSortOrder,
                    questionCurrentPage,
                    questionPageSize,
                    filteredAdminQuestions,
                    totalQuestionPages,
                    paginatedAdminQuestions,
                    prevQuestionPage,
                    nextQuestionPage,
                    startEditQuestion,
                    cancelEditQuestion,
                    deleteQuestionFromDb,
                    handleSaveCustomQuestion,
                    getCorrectOptionText,
                    showAddStaffForm,
                    newStaff,
                    addNewStaff,
                    saveStaffMember,
                    deleteStaffMember,
                    teachersDisplayList,
                    carsDisplayList,
                    showPassportFull,
                    showChangePasswordModal,
                    newPasswordInput,
                    confirmPasswordInput,
                    passwordChangeSuccess,
                    passwordChangeError,
                    handleChangePassword,
                    t
                };
            },
            compilerOptions: {
                delimiters: ['[[', ']]']
            }
        }).mount('#app');
    </script>
</body>
</html>
