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
        body {
            background-color: #f1f5f9;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .timer-circle {
            transition: stroke-dashoffset 1s linear;
        }

        /* Sharp 3D Card System (No perspective rotation to prevent text blurring) */
        .card-3d {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-bottom: 5px solid #94a3b8;
            box-shadow: 0 10px 20px -10px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.2s ease-in-out;
        }
        
        .card-3d:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.12), 0 4px 8px -2px rgba(0, 0, 0, 0.05);
            border-bottom: 5px solid #64748b;
        }

        /* 3D Physical Push Button Style */
        .btn-3d {
            transition: all 0.1s ease-in-out;
            position: relative;
        }

        .btn-3d:active:not(:disabled) {
            transform: translateY(2px) !important;
            border-bottom-width: 1px !important;
        }

        .btn-3d-blue {
            background: linear-gradient(180deg, #3b82f6 0%, #0066cc 100%);
            border-bottom: 4px solid #004fad;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            box-shadow: 0 4px 6px rgba(0, 102, 204, 0.2);
            color: white;
        }

        .btn-3d-blue:hover:not(:disabled) {
            background: linear-gradient(180deg, #2563eb 0%, #1d4ed8 100%);
            border-bottom-color: #1e3a8a;
        }

        .btn-3d-blue:active:not(:disabled) {
            box-shadow: 0 1px 2px rgba(0, 102, 204, 0.1);
        }

        /* 3D Keypad Button (Pagination) */
        .key-3d {
            position: relative;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-bottom: 3px solid #94a3b8;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            color: #334155;
            transition: all 0.1s ease-in-out;
        }

        .key-3d:hover:not(:disabled) {
            background: #f8fafc;
            border-color: #94a3b8;
            border-bottom-color: #64748b;
        }

        .key-3d:active:not(:disabled) {
            transform: translateY(2px);
            border-bottom-width: 1px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.08);
        }

        .key-3d-active {
            background: linear-gradient(180deg, #3b82f6 0%, #0066cc 100%) !important;
            border-color: #005bb7 !important;
            border-bottom: 3px solid #004fad !important;
            color: #ffffff !important;
            box-shadow: 0 4px 8px rgba(0, 102, 204, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.3) !important;
        }

        .key-3d-correct {
            background: linear-gradient(180deg, #34d399 0%, #10b981 100%) !important;
            border-color: #059669 !important;
            border-bottom: 3px solid #047857 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.3) !important;
        }

        .key-3d-incorrect {
            background: linear-gradient(180deg, #f87171 0%, #ef4444 100%) !important;
            border-color: #dc2626 !important;
            border-bottom: 3px solid #b91c1c !important;
            color: #ffffff !important;
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.25), inset 0 1px 0 rgba(255, 255, 255, 0.3) !important;
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

        .dark-theme .text-emerald-600,
        .dark-theme .text-emerald-500,
        .dark-theme .text-green-600,
        .dark-theme .text-green-500 {
            color: #34d399 !important;
        }
        
        .dark-theme .text-red-600,
        .dark-theme .text-red-500,
        .dark-theme .text-rose-600,
        .dark-theme .text-rose-500 {
            color: #f87171 !important;
        }
        
        .dark-theme .text-blue-600,
        .dark-theme .text-blue-500 {
            color: #60a5fa !important;
        }

        .dark-theme code,
        .dark-theme .bg-gray-200 {
            background-color: #334155 !important; /* slate-700 background */
            color: #cbd5e1 !important; /* slate-300 text */
            border: 1px solid #475569 !important;
        }

        .dark-theme .grade-delete-btn {
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #f87171 !important;
        }
        
        .dark-theme .grade-delete-btn:hover {
            background-color: #ef4444 !important;
            color: #ffffff !important;
        }

        .dark-theme .text-slate-800,
        .dark-theme .text-slate-700,
        .dark-theme .text-gray-700,
        .dark-theme .text-gray-600 {
            color: #f1f5f9 !important;
        }

        .dark-theme .text-gray-500,
        .dark-theme .text-gray-400 {
            color: #94a3b8 !important;
        }

        .dark-theme input,
        .dark-theme select,
        .dark-theme textarea {
            background-color: #0f172a !important;
            border-color: #334155 !important;
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
    </style>
</head>
<body class="bg-gray-50/50 min-h-screen flex flex-col justify-between">

    <div id="app" v-cloak :class="{ 'dark-theme': isDarkMode }" class="flex flex-col min-h-screen justify-between transition-colors duration-200">
        
        <!-- ==================== HEADER ==================== -->
        <header class="bg-white border-b border-gray-200/80 py-4 px-6 sticky top-0 z-50 shadow-sm">
            <div class="max-w-full mx-auto flex items-center justify-between px-2 md:px-4">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <svg width="42" height="42" viewBox="0 0 100 100" class="drop-shadow-sm">
                        <polygon points="50,5 10,85 90,85" fill="#0066cc" />
                        <text x="50" y="70" fill="#ffffff" font-family="'Inter', sans-serif" font-weight="900" font-size="54" text-anchor="middle">A</text>
                    </svg>
                    <span class="text-[#0066cc] font-black text-2xl tracking-tighter select-none">DELTA_AVTOMAKTAB_UZ</span>
                </div>

                <!-- Live Status & Admin Toggle -->
                <div class="flex items-center gap-4 text-xs font-mono text-gray-500">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                        <span>TIZIM: ON-LINE</span>
                    </div>

                    <!-- Dark Mode Toggle Button -->
                    <button 
                        @click="isDarkMode = !isDarkMode" 
                        class="btn-3d flex items-center justify-center p-2 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 transition-all cursor-pointer shadow-sm"
                        style="width: 32px; height: 32px;"
                        title="Mavzuni o'zgartirish"
                    >
                        <span>[[ isDarkMode ? '☀️' : '🌙' ]]</span>
                    </button>

                    <!-- Display logout and profile name if logged in -->
                    <div v-if="isLoggedIn" class="flex items-center gap-3">
                        
                        <!-- Admin Panel Button (Only visible if admin is logged in and in admin mode) -->
                        <button 
                            v-if="loggedInUserType === 'admin' && isAdminMode"
                            @click="triggerAdminPanelToggle" 
                            class="btn-3d px-3.5 py-2 rounded-xl font-bold transition-all text-[10px]"
                            :class="isAdminMode ? 'bg-amber-500 hover:bg-amber-600 text-white border-b-4 border-b-amber-700' : 'bg-[#0066cc] text-white hover:bg-blue-700 border-b-4 border-b-[#004fad]'"
                        >
                            <span v-if="isAdminMode">🏠 TEST REJIMIGA O'TISH</span>
                            <span v-else>⚙️ ADMIN PANEL</span>
                        </button>

                        <!-- Logout Button -->
                        <button 
                            @click="handleLogout"
                            class="btn-3d px-3.5 py-2 rounded-xl font-bold bg-rose-600 text-white hover:bg-rose-700 border-b-4 border-b-rose-800 transition-all text-[10px]"
                        >
                            🚪 CHIQISH
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- ==================== MAIN CONTENT ==================== -->
        
        <!-- ==================== LOGIN WORKSPACE ==================== -->
        <div v-if="!isLoggedIn" class="max-w-md mx-auto my-auto px-4 py-12 flex-grow w-full flex flex-col justify-center items-center">
            <div class="card-3d p-8 rounded-3xl w-full text-center flex flex-col gap-6 bg-white border border-slate-200 shadow-xl">
                <div class="w-16 h-16 bg-blue-50 text-[#0066cc] rounded-2xl flex items-center justify-center text-3xl mx-auto shadow-sm border border-blue-100">
                    🔑
                </div>
                <div class="space-y-1">
                    <h2 class="text-2xl font-black text-slate-800 tracking-tight">TIZIMGA KIRISH</h2>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">DELTA_AVTOMAKTAB_UZ PORTALI</p>
                </div>
                
                <!-- Tabs to choose login mode -->
                <div class="flex border-b border-gray-100 pb-2 gap-2 justify-center">
                    <button 
                        @click="loginTab = 'student'; authError = '';"
                        class="px-4 py-2 text-xs font-extrabold rounded-lg transition-all"
                        :class="loginTab === 'student' ? 'bg-[#0066cc] text-white shadow-sm' : 'text-gray-400 hover:text-gray-600'"
                    >
                        👨‍🎓 O'QUVCHI TIZIMI
                    </button>
                    <button 
                        @click="loginTab = 'admin'; authError = '';"
                        class="px-4 py-2 text-xs font-extrabold rounded-lg transition-all"
                        :class="loginTab === 'admin' ? 'bg-[#0066cc] text-white shadow-sm' : 'text-gray-400 hover:text-gray-600'"
                    >
                        ⚙️ ADMIN PANEL
                    </button>
                </div>

                <!-- 1. Student Panel Unlock Form -->
                <form v-if="loginTab === 'student'" @submit.prevent="handleStudentPanelUnlock" class="flex flex-col gap-4 text-left">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">O'quvchi paneliga kirish paroli</label>
                        <input 
                            type="password" 
                            v-model="studentPanelUnlockPassword" 
                            placeholder="Parolni kiriting" 
                            class="p-3 rounded-xl border text-xs bg-slate-50 focus:bg-white text-slate-800 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            required
                        />
                    </div>
                    
                    <div v-if="authError" class="p-3 bg-red-50 border border-red-100 rounded-xl text-red-600 text-xs font-bold text-center">
                        [[ authError ]]
                    </div>
                    
                    <button 
                        type="submit"
                        class="btn-3d w-full py-3 bg-[#0066cc] text-white rounded-xl text-xs font-extrabold shadow-md transition-all border-b-[4px] border-b-[#004fad] hover:bg-blue-600"
                    >
                        TIZIMGA KIRISH
                    </button>
                </form>

                <!-- 2. Admin Login Form -->
                <form v-else @submit.prevent="handleLogin" class="flex flex-col gap-4 text-left">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Admin Login (Foydalanuvchi nomi)</label>
                        <input 
                            type="text" 
                            v-model="authUsername" 
                            placeholder="Admin loginini kiriting" 
                            class="p-3 rounded-xl border text-xs bg-slate-50 focus:bg-white text-slate-800 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            required
                        />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">Admin maxfiy paroli</label>
                        <input 
                            type="password" 
                            v-model="authPassword" 
                            placeholder="Admin paroloni kiriting" 
                            class="p-3 rounded-xl border text-xs bg-slate-50 focus:bg-white text-slate-800 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            required
                        />
                    </div>
                    
                    <div v-if="authError" class="p-3 bg-red-50 border border-red-100 rounded-xl text-red-600 text-xs font-bold text-center">
                        [[ authError ]]
                    </div>
                    
                    <button 
                        type="submit"
                        class="btn-3d w-full py-3 bg-[#0066cc] text-white rounded-xl text-xs font-extrabold shadow-md transition-all border-b-[4px] border-b-[#004fad] hover:bg-blue-600"
                    >
                        ADMIN PANELGA KIRISH
                    </button>
                </form>
            </div>
        </div>

        <!-- ==================== AUTHENTICATED WORKSPACE ==================== -->
        <template v-else>
        
        <!-- ==================== ADMIN PANEL WORKSPACE ==================== -->
        <div v-if="isAdminMode" class="max-w-full mx-auto px-4 md:px-8 py-8 flex-grow w-full flex flex-col md:flex-row gap-6">
            
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
                        <div class="card-3d p-5 rounded-2xl flex flex-col justify-between border-b-[5px] border-b-amber-500">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wide">Kassa Balansi (Net)</span>
                            <span class="text-3xl font-black text-emerald-600 my-2">[[ formatMoney(financeSummary.profit) ]]</span>
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
                                        <span class="text-slate-800">Sof Foyda:</span>
                                        <span class="text-emerald-600 font-mono text-sm">[[ formatMoney(financeSummary.profit) ]]</span>
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
                    <div class="flex justify-between items-center border-b pb-4">
                        <h2 class="text-lg font-bold text-slate-800">// O'QITUVCHILAR VA TO'LOV TIZIMI</h2>
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
                                    <th class="p-3 text-gray-400 font-bold text-right">HISOB-KITOB TO'LOVI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="t in staffList" :key="t.id" class="border-b hover:bg-gray-50/50">
                                    <td class="p-3 font-bold text-slate-800">[[ t.name ]]</td>
                                    <td class="p-3 font-semibold text-gray-600">[[ t.role ]]</td>
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
                                    <td class="p-3 text-right font-mono font-extrabold text-slate-800">
                                        [[ formatMoney(calculateTeacherSalary(t)) ]]
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
                            class="p-4 bg-blue-50 rounded-2xl border border-blue-100 text-center cursor-pointer hover:scale-[1.03] active:scale-[0.98] transition-all duration-200 hover:shadow-sm"
                        >
                            <span class="text-[10px] font-bold text-blue-600 block uppercase">// NET PROFIT (BOSING)</span>
                            <span class="text-xl font-bold text-blue-600 font-mono">[[ formatMoney(financeSummary.profit) ]]</span>
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

                <!-- ==================== TAB: SOZLAMALAR ==================== -->
                <div v-else-if="activeAdminTab === 'sozlamalar'" class="card-3d p-6 rounded-3xl flex flex-col gap-6 text-left">
                    <h2 class="text-lg font-bold text-slate-800 uppercase tracking-tight">// TIZIM SOZLAMALARI</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-gray-500">Maktab Nomi (Tizimda)</label>
                            <input type="text" value="DELTA_AVTOMAKTAB_UZ Haydovchilik Maktabi" class="p-2.5 rounded-xl border text-xs bg-slate-50 text-slate-500 font-medium" disabled />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-gray-500">Test o'tish balli</label>
                            <input type="number" value="20" class="p-2.5 rounded-xl border text-xs bg-slate-50 text-slate-500 font-medium" disabled />
                        </div>
                    </div>

                    <div class="border-t pt-6 flex flex-col gap-4">
                        <h3 class="text-sm font-black text-slate-800 uppercase tracking-wider">// PANEL PAROLLARINI O'ZGARTIRISH</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">Admin Login (Foydalanuvchi nomi)</label>
                                <input type="text" v-model="adminUsernameSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">Admin Maxfiy Parol</label>
                                <input type="text" v-model="adminPasswordSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                            <div class="flex flex-col gap-2">
                                <label class="text-xs font-bold text-gray-500">O'quvchi Tizimi Paroli</label>
                                <input type="text" v-model="studentPanelPasswordSetting" class="p-2.5 rounded-xl border text-xs bg-white text-slate-700 font-semibold focus:outline-none focus:ring-2 focus:ring-blue-500/20" />
                            </div>
                        </div>
                        <p class="text-[10px] text-amber-600 font-bold uppercase tracking-wide bg-amber-50 p-3 rounded-xl border border-amber-200/50 mt-1">
                            ⚠️ Diqqat: Yangi login va parollar darhol amal qiladi. Keyingi safar kirishda yangi parollarni ishlatasiz.
                        </p>
                    </div>
                </div>

            </main>
        </div>

        <!-- ==================== STUDENT WORKSPACE ==================== -->
        <main v-else class="max-w-full mx-auto px-4 md:px-8 py-8 flex-grow w-full flex flex-col items-center">
            
            <!-- 1. Language selector -->
            <div class="flex justify-center gap-3 mb-8">
                <button 
                    @click="setLanguage('uz_lat')"
                    class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200"
                    :class="currentLang === 'uz_lat' ? 'bg-[#0066cc] text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200/70'"
                >
                    O'zbek
                </button>
                <button 
                    @click="setLanguage('en')"
                    class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200"
                    :class="currentLang === 'en' ? 'bg-[#0066cc] text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200/70'"
                >
                    English
                </button>
                <button 
                    @click="setLanguage('ru')"
                    class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200"
                    :class="currentLang === 'ru' ? 'bg-[#0066cc] text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200/70'"
                >
                    Русский
                </button>
                <button 
                    @click="setLanguage('qr')"
                    class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200"
                    :class="currentLang === 'qr' ? 'bg-[#0066cc] text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200/70'"
                >
                    Qaraqalpaq
                </button>
            </div>

            <!-- Loading State -->
            <div v-if="loading" class="flex-grow flex flex-col items-center justify-center py-20">
                <div class="w-12 h-12 border-4 border-[#0066cc]/20 border-t-[#0066cc] rounded-full animate-spin mb-4"></div>
                <span class="text-sm font-semibold text-gray-500">Test yuklanmoqda...</span>
            </div>

            <!-- Test Welcome Start Screen -->
            <div v-if="!loading && !isTestStarted" class="flex-grow flex flex-col items-center justify-center py-12 max-w-xl mx-auto w-full">
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
                            <span class="px-2.5 py-1 rounded-full text-[9px] uppercase"
                                  :class="getStudentSubscriptionStatusById(loggedInStudentId) === 'Faol' ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800'">
                                [[ getStudentSubscriptionStatusById(loggedInStudentId) === 'Faol' ? 'Faol obuna' : 'Obuna tugagan' ]]
                            </span>
                        </div>
                        
                        <div v-else class="flex flex-col gap-2">
                            <select 
                                v-model="selectedStudentId" 
                                @change="studentSelectPassword = ''; studentSelectError = '';"
                                class="w-full p-3 rounded-xl border text-xs bg-white font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                            >
                                <option :value="null">-- O'quvchi profilini tanlang --</option>
                                <option v-for="s in studentsList" :key="s.id" :value="s.id">
                                    [[ s.name ]] ([[ s.class_name ]])
                                </option>
                            </select>

                            <!-- Student password field -->
                            <div v-if="selectedStudentId !== null" class="flex flex-col gap-1.5 mt-2">
                                <label class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">O'quvchi maxfiy paroli</label>
                                <input 
                                    type="password" 
                                    v-model="studentSelectPassword" 
                                    placeholder="Parolingizni kiriting" 
                                    class="w-full p-3 rounded-xl border text-xs bg-white font-semibold text-slate-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                                />
                            </div>
                            <div v-if="studentSelectError" class="p-2.5 bg-red-50 border border-red-100 rounded-xl text-red-600 text-[10px] font-bold text-center mt-1">
                                [[ studentSelectError ]]
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
                    </div>

                    <!-- Exam Start Button (Only visible if active) -->
                    <button 
                        v-if="selectedStudentId !== null && getStudentSubscriptionStatusById(selectedStudentId) === 'Faol'"
                        @click="startActualTest" 
                        class="btn-3d w-full py-4 bg-[#0066cc] text-white rounded-2xl text-base font-extrabold shadow-lg shadow-blue-500/20 transition-all border-b-[5px] border-b-[#004fad] hover:bg-blue-600"
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
            <div v-if="!loading && isTestStarted && questions.length > 0 && !testFinished" class="w-full flex flex-col gap-8">
                
                <!-- Controls and Navigation Row -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    
                    <!-- Timer and Finish button -->
                    <div class="flex items-center gap-6">
                        <!-- Circular Timer -->
                        <div class="relative w-24 h-24 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                <circle 
                                    cx="50" cy="50" r="42" 
                                    stroke="#e2e8f0" stroke-width="6" 
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
                            <span class="absolute text-xl font-bold text-slate-800">[[ formattedTime ]]</span>
                        </div>

                        <!-- Terminate Button -->
                        <button 
                            @click="finishTest"
                            class="px-5 py-3.5 bg-gray-100 hover:bg-red-50 hover:text-red-600 rounded-2xl text-xs font-bold uppercase tracking-wider text-gray-600 transition-all border border-transparent hover:border-red-200/60"
                        >
                            TESTNI YAKUNLASH
                        </button>
                    </div>

                    <!-- Navigation Pagination Grid -->
                    <div class="flex flex-col gap-2 w-full md:w-auto">
                        <div class="flex flex-wrap gap-1.5 justify-center md:justify-end max-w-md">
                            <!-- Prev Arrow -->
                            <button 
                                @click="prevQuestion"
                                :disabled="currentQuestionIndex === 0"
                                class="w-9 h-9 flex items-center justify-center border border-gray-200 bg-white rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed font-bold"
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
                                class="w-9 h-9 flex items-center justify-center border border-gray-200 bg-white rounded-lg text-sm hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed font-bold"
                            >
                                &raquo;
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Active Question and Options Area -->
                <div class="card-3d p-8 rounded-3xl flex flex-col items-center">
                    
                    <!-- SVG Illustration representation of current question -->
                    <div class="mb-8 w-full max-w-sm h-48 bg-gray-50/50 rounded-2xl flex items-center justify-center p-6 border border-gray-100/60 shadow-inner question-illustration-container">
                        <!-- Dynamic SVG based on question index -->
                        <div v-html="getQuestionIllustration(currentQuestion)"></div>
                    </div>

                    <!-- Question Text and Speak Button -->
                    <div class="flex flex-col items-center gap-3 mb-8 w-full max-w-3xl">
                        <h2 class="text-xl font-bold text-slate-800 text-center leading-relaxed">
                            [[ currentQuestionData.question ]]
                        </h2>
                        <button 
                            @click="readQuestionAloud"
                            class="btn-3d flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 text-[#0066cc] hover:bg-blue-100 rounded-xl text-[10px] font-extrabold transition-all shadow-sm border border-blue-100 dark:bg-slate-800 dark:text-[#60a5fa] dark:border-slate-700"
                        >
                            🔊 SAVOLNI TINGLASH
                        </button>
                    </div>

                    <!-- Answer Options Stack -->
                    <div class="w-full max-w-2xl flex flex-col gap-4">
                        <button 
                            v-for="opt in currentQuestionData.options"
                            :key="opt.id"
                            @click="selectOption(opt.id)"
                            :disabled="userAnswers[currentQuestionId] !== undefined"
                            class="btn-3d w-full text-left p-5 rounded-2xl transition-all duration-150 group flex items-center justify-between"
                            :class="[
                                userAnswers[currentQuestionId] !== undefined
                                    ? opt.id === currentCorrectOptionId
                                        ? 'bg-emerald-50 border border-emerald-400 text-emerald-800 font-semibold border-b-[5px] border-b-emerald-600'
                                        : userAnswers[currentQuestionId] === opt.id
                                            ? 'bg-rose-50 border border-rose-400 text-rose-800 font-semibold border-b-[5px] border-b-rose-600'
                                            : 'bg-gray-50/40 border border-gray-100 text-gray-400 opacity-60 border-b-[2px] border-b-gray-200'
                                    : 'bg-white border border-gray-200 text-slate-700 hover:bg-gray-50/80 border-b-[5px] border-b-slate-200'
                            ]"
                        >
                            <span class="text-sm font-semibold">[[ opt.text ]]</span>
                            <div 
                                class="w-5 h-5 rounded-full border flex items-center justify-center transition-all"
                                :class="[
                                    userAnswers[currentQuestionId] !== undefined
                                        ? opt.id === currentCorrectOptionId
                                            ? 'border-emerald-500 bg-emerald-500'
                                            : userAnswers[currentQuestionId] === opt.id
                                                ? 'border-rose-500 bg-rose-500'
                                                : 'border-gray-200 bg-transparent'
                                        : userAnswers[currentQuestionId] === opt.id
                                            ? 'border-[#0066cc] bg-[#0066cc]'
                                            : 'border-gray-300 group-hover:border-gray-400 bg-white'
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
                            ? 'bg-emerald-50 border border-emerald-300' 
                            : 'bg-amber-50 border border-amber-300'"
                    >
                        <span class="text-2xl mt-0.5">🔊</span>
                        <div class="flex flex-col gap-1">
                            <span 
                                class="text-xs font-bold uppercase tracking-wider"
                                :class="audioMessage.type === 'correct' ? 'text-emerald-700' : 'text-amber-700'"
                            >
                                [[ audioMessage.type === 'correct' ? '✅ TO\'G\'RI JAVOB' : '📖 TO\'G\'RI JAVOB' ]]
                            </span>
                            <p 
                                class="text-sm font-semibold leading-relaxed"
                                :class="audioMessage.type === 'correct' ? 'text-emerald-900' : 'text-amber-900'"
                            >
                                [[ audioMessage.text ]]
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Result Summary Screen -->
            <div v-if="!loading && isTestStarted && testFinished" class="w-full max-w-3xl bg-white p-8 rounded-2xl border border-gray-100 shadow-sm flex flex-col items-center">
                
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
        <footer class="bg-white border-t border-gray-200/80 py-4 px-6 font-mono text-[10px] text-gray-400 shadow-inner">
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
        const { createApp, ref, onMounted, computed, watch, nextTick } = Vue;

        createApp({
            setup() {
                const questions = ref([]);
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
                        panel_wrong: "✅ To'g'ri javob:"
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
                        panel_wrong: "✅ Correct answer:"
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
                        panel_wrong: "✅ Правильный ответ:"
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
                        panel_wrong: "✅ Durıs juwap:"
                    }
                };
                    const t = (key) => {
                    return uiDict[currentLang.value] && uiDict[currentLang.value][key] ? uiDict[currentLang.value][key] : key;
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
                watch(adminUsernameSetting, (newVal) => {
                    localStorage.setItem('admin_user', newVal);
                });

                const adminPasswordSetting = ref(localStorage.getItem('admin_pass') || 'admin777');
                watch(adminPasswordSetting, (newVal) => {
                    localStorage.setItem('admin_pass', newVal);
                });

                const studentPanelPasswordSetting = ref(localStorage.getItem('student_panel_pass') || '12345');
                watch(studentPanelPasswordSetting, (newVal) => {
                    localStorage.setItem('student_panel_pass', newVal);
                });

                const loginTab = ref('student');
                const studentPanelUnlockPassword = ref('');
                const studentSelectPassword = ref('');
                const studentSelectError = ref('');

                const showAdminVerifyModal = ref(false);
                const adminVerifyPasswordInput = ref('');
                const adminVerifyError = ref('');
                
                // Manager Panel states
                const newStudent = ref({ name: '', class_name: 'A-10', login: '', password: '', subscription_end_date: '2026-08-08' });
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
                
                const newPartner = ref({
                    name: '',
                    phone: '',
                    commission: 10
                });

                const partnersList = ref([
                    { id: 1, name: 'Trans-Avto LLC', phone: '+998 (90) 123-45-67', commission: 15, joined_date: '2026-01-15', status: 'Active' },
                    { id: 2, name: 'YHQ Milliy Maktab', phone: '+998 (94) 987-65-43', commission: 10, joined_date: '2026-03-20', status: 'Active' },
                    { id: 3, name: 'Avto-Drayv Hamkor', phone: '+998 (99) 444-55-66', commission: 12, joined_date: '2026-05-02', status: 'Active' }
                ]);

                const studentsList = ref([
                    { id: 1, name: 'Alijon Karimov', class_name: 'A-10', today_status: 'keldi', grades: [5, 4, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-10', login: 'alijon', password: '123' },
                    { id: 2, name: 'Madina Rustamova', class_name: 'A-10', today_status: 'keldi', grades: [4, 4, 3], tuition_status: 'Kutilmoqda', subscription_end_date: '2026-07-05', login: 'madina', password: '123' },
                    { id: 3, name: 'Sardorbek Olimov', class_name: 'B-12', today_status: 'kelmadi', grades: [5, 5, 5], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-15', login: 'sardor', password: '123' },
                    { id: 4, name: 'Durdona Hakimova', class_name: 'B-12', today_status: 'keldi', grades: [3, 4, 4], tuition_status: 'To\'lagan', subscription_end_date: '2026-08-20', login: 'durdona', password: '123' },
                    { id: 5, name: 'Javohir Toshpulatov', class_name: 'C-05', today_status: 'keldi', grades: [2, 3, 3], tuition_status: 'Kutilmoqda', subscription_end_date: '2026-07-02', login: 'javohir', password: '123' }
                ]);

                // Test attempts tracking state
                const selectedReportStudentId = ref(null);
                const studentTestAttemptsList = ref([
                    { id: 1, student_id: 1, student_name: 'Alijon Karimov', date: '2026-07-08 11:30', score: 18, total_questions: 20, level: 1, status: 'Yiqildi (18/20)' },
                    { id: 2, student_id: 1, student_name: 'Alijon Karimov', date: '2026-07-08 12:15', score: 20, total_questions: 20, level: 1, status: "O'tdi (20/20)" },
                    { id: 3, student_id: 2, student_name: 'Madina Rustamova', date: '2026-07-07 15:40', score: 15, total_questions: 20, level: 1, status: 'Yiqildi (15/20)' },
                    { id: 4, student_id: 3, student_name: 'Sardorbek Olimov', date: '2026-07-08 10:00', score: 20, total_questions: 20, level: 1, status: "O'tdi (20/20)" },
                    { id: 5, student_id: 3, student_name: 'Sardorbek Olimov', date: '2026-07-08 10:45', score: 20, total_questions: 20, level: 2, status: "O'tdi (20/20)" },
                    { id: 6, student_id: 4, student_name: 'Durdona Hakimova', date: '2026-07-06 14:10', score: 19, total_questions: 20, level: 1, status: 'Yiqildi (19/20)' },
                    { id: 7, student_id: 5, student_name: 'Javohir Toshpulatov', date: '2026-07-05 09:30', score: 12, total_questions: 20, level: 1, status: 'Yiqildi (12/20)' }
                ]);

                const classesList = ref([
                    { name: 'A-10', type: 'Yengil avtomobillar (B)' },
                    { name: 'B-12', type: 'Yuk avtomobillari (C)' },
                    { name: 'C-05', type: 'Tirkamalar (E)' }
                ]);

                const staffList = ref([
                    { id: 1, name: 'Shavkat Rahmonov', role: 'Katta o\'qituvchi', payment_type: 'percentage', base_salary: 3000000, percentage_rate: 40, students_count: 12, tuition_fee_per_student: 800000 },
                    { id: 2, name: 'Malika Sobirova', role: 'Nazariya o\'qituvchisi', payment_type: 'fixed', base_salary: 4500000, percentage_rate: 30, students_count: 15, tuition_fee_per_student: 800000 },
                    { id: 3, name: 'Jamshid Tojiyev', role: 'Amaliy yo\'riqchi', payment_type: 'percentage', base_salary: 2500000, percentage_rate: 50, students_count: 8, tuition_fee_per_student: 800000 },
                    { id: 4, name: 'Nodira Azimova', role: 'Bosh hisobchi', payment_type: 'fixed', base_salary: 5000000, percentage_rate: 0, students_count: 0, tuition_fee_per_student: 0 }
                ]);

                const financeTransactionsList = ref([
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

                        // Chrome/browser bug prevention: biroz kechikish bilan gapirtiramiz
                        setTimeout(() => {
                            try {
                                window.speechSynthesis.resume();
                                window.speechSynthesis.speak(utter);
                            } catch (err) {}
                        }, 100);
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
                    // Load fresh questions for current level from backend
                    await loadQuestions();
                };

                const startActualTest = () => {
                    studentSelectError.value = '';
                    
                    if (loggedInUserType.value !== 'student' && selectedStudentId.value !== null) {
                        const student = studentsList.value.find(s => s.id === selectedStudentId.value);
                        if (student) {
                            if (!studentSelectPassword.value) {
                                studentSelectError.value = "O'quvchi maxfiy parolini kiriting!";
                                return;
                            }
                            if (student.password !== studentSelectPassword.value) {
                                studentSelectError.value = "Kiritilgan o'quvchi paroli noto'g'ri!";
                                return;
                            }
                            // Save selected student ID to loggedInStudentId to log the test attempts correctly
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
                    
                    financeTransactionsList.value.unshift({
                        id: financeTransactionsList.value.length + 1,
                        type: 'kirim',
                        category: `O'quvchi to'lovi (${student.name}) - ${chatSelectedPaymentMethod.value}`,
                        amount: chatEnteredAmount.value,
                        date: new Date().toISOString().replace('T', ' ').substring(0, 16)
                    });
                    
                    chatMessages.value.push({ sender: 'user', text: "Tasdiqlayman" });
                    
                    addBotMessage(
                        `🎉 Muvaffaqiyatli! ${student.name} uchun ${formatMoney(chatEnteredAmount.value)} miqdoridagi to'lov qabul qilindi. Kassa va moliya balansi muvaffaqiyatli yangilandi.`,
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

                    const student = studentsList.value.find(
                        s => s.login === authUsername.value.toLowerCase().trim() && s.password === authPassword.value
                    );

                    if (student) {
                        isLoggedIn.value = true;
                        loggedInUserType.value = 'student';
                        loggedInStudentId.value = student.id;
                        selectedStudentId.value = student.id;
                        isAdminMode.value = false;

                        if (getStudentSubscriptionStatus(student) === 'Faol') {
                            loadQuestions().then(() => {
                                startActualTest();
                            });
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
                    isLoggedIn.value = false;
                    loggedInUserType.value = '';
                    loggedInStudentId.value = null;
                    selectedStudentId.value = null;
                    authUsername.value = '';
                    authPassword.value = '';
                    authError.value = '';
                    isAdminMode.value = false;
                    studentPanelUnlockPassword.value = '';
                    studentSelectPassword.value = '';
                    studentSelectError.value = '';
                };

                const triggerAdminPanelToggle = () => {
                    if (isAdminMode.value) {
                        isAdminMode.value = false;
                    } else {
                        showAdminVerifyModal.value = true;
                        adminVerifyPasswordInput.value = '';
                        adminVerifyError.value = '';
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
                        subscription_end_date: newStudent.value.subscription_end_date || '2026-08-08',
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
                    newStudent.value = { name: '', class_name: 'A-10', login: '', password: '', subscription_end_date: '2026-08-08' };
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

                // Computed finance summaries
                const financeSummary = computed(() => {
                    // Let's calculate total income from transactions
                    let kirim = financeTransactionsList.value
                        .filter(t => t.type === 'kirim')
                        .reduce((sum, t) => sum + t.amount, 0);
                        
                    // Let's add student tuitions as prospective income
                    studentsList.value.forEach(s => {
                        if (s.tuition_status === 'To\'lagan') {
                            kirim += 800000;
                        }
                    });

                    // Chiqim (salaries + other expenses)
                    let staffPayouts = 0;
                    staffList.value.forEach(t => {
                        staffPayouts += calculateTeacherSalary(t);
                    });

                    const expenses = financeTransactionsList.value
                        .filter(t => t.type === 'chiqim')
                        .reduce((sum, t) => sum + t.amount, 0);

                    const chiqim = staffPayouts + expenses;
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

                onMounted(async () => {
                    await loadQuestions();
                });

                return {
                    questions,
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
                    selectOption,
                    readQuestionAloud,
                    gotoQuestion,
                    nextQuestion,
                    prevQuestion,
                    finishTest,
                    testFinished,
                    score,
                    resetTest,
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
                    studentPanelPasswordSetting,
                    handleStudentPanelUnlock,
                    handleLogin,
                    handleLogout,
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
