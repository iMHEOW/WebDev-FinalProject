<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUP Care - Doctor Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="font-sans antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-white border-r border-slate-100 p-5 flex flex-col justify-between h-full shrink-0">
            <div>
                <div class="flex items-center space-x-3 px-2 mb-8">
                    <div class="bg-blue-600 text-white p-2 rounded-xl shadow-md shadow-blue-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-slate-800 tracking-tight">PUP Care</span>
                </div>

                <nav class="space-y-1">
                    <a href="/doctor/dashboard" class="flex items-center space-x-3 bg-blue-50 text-blue-600 px-4 py-3 rounded-xl text-sm font-semibold transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="/doctor/patients" class="flex items-center space-x-3 text-slate-400 hover:text-slate-700 hover:bg-slate-50 px-4 py-3 rounded-xl text-sm font-medium transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Patients</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-slate-400 hover:text-slate-700 hover:bg-slate-50 px-4 py-3 rounded-xl text-sm font-medium transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Appointment</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 text-slate-400 hover:text-slate-700 hover:bg-slate-50 px-4 py-3 rounded-xl text-sm font-medium transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span>Lab Reports</span>
                    </a>
                </nav>
            </div>

            <div>
                <a href="#" class="flex items-center space-x-3 text-slate-400 hover:text-rose-600 hover:bg-rose-50 px-4 py-3 rounded-xl text-sm font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span>Log out</span>
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col h-full overflow-hidden">
            
            <header class="bg-white border-b border-slate-100 h-20 shrink-0 flex items-center justify-between px-10">
                <div class="relative w-96">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search" class="w-full bg-[#f4f7fc] pl-11 pr-4 py-2.5 rounded-full text-sm outline-none border border-transparent focus:border-slate-200 focus:bg-white transition">
                </div>

                <div class="flex items-center space-x-6">
                    <button class="relative text-slate-400 hover:text-slate-600 transition">
                        <span class="absolute top-0 right-0 w-2 h-2 bg-rose-500 rounded-full border border-white"></span>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                   
                    <div class="flex items-center space-x-3 border-l border-slate-100 pl-6">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-800">Dr. AJ</p>
                            <p class="text-xs text-slate-400 font-medium">Cardiologist</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-sm">
                            DS
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-10 space-y-8">
                
                <div class="grid grid-cols-12 gap-8">
                    
                    <div class="col-span-8 hospital-card flex flex-col justify-between min-h-[480px]">
                        <div>
                            <div class="flex justify-between items-center mb-6">
                                <h4 class="font-bold text-slate-800 tracking-tight text-lg">Upcoming Appointments</h4>
                                <span class="text-xs font-semibold text-slate-400">Sorted by Date</span>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="text-xs font-bold text-slate-400 uppercase border-b border-slate-100">
                                            <th class="pb-3 font-semibold">Patient</th>
                                            <th class="pb-3 font-semibold">Date</th>
                                            <th class="pb-3 font-semibold">Time</th>
                                            <th class="pb-3 font-semibold">Type</th>
                                            <th class="pb-3 font-semibold text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 text-sm font-medium text-slate-700">
                                        <tr>
                                            <td class="py-4 font-bold text-slate-800">123</td>
                                            <td class="py-4">June 16, 2026</td>
                                            <td class="py-4 text-blue-600">09:40 AM</td>
                                            <td class="py-4">
                                                <span class="bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-md text-xs font-bold">Teleconsult</span>
                                            </td>
                                            <td class="py-4 text-right">
                                                <a href="/doctor/consultation" class="text-xs font-bold bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition">Start</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 font-bold text-slate-800">Juan Dela Cruz</td>
                                            <td class="py-4">June 16, 2026</td>
                                            <td class="py-4 text-blue-600">10:00 AM</td>
                                            <td class="py-4">
                                                <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-md text-xs font-bold">F2F</span>
                                            </td>
                                            <td class="py-4 text-right">
                                                <a href="/doctor/consultation" class="text-xs font-bold bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition">Start</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-4 font-bold text-slate-800">Ako</td>
                                            <td class="py-4">June 17, 2026</td>
                                            <td class="py-4 text-blue-600">02:30 PM</td>
                                            <td class="py-4">
                                                <span class="bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-md text-xs font-bold">Teleconsult</span>
                                            </td>
                                            <td class="py-4 text-right">
                                                <a href="/doctor/consultation" class="text-xs font-bold bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition">Start</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-4 hospital-card flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-6">
                                <h4 class="font-bold text-slate-800 tracking-tight text-lg">Pending Tasks</h4>
                                <span class="bg-amber-100 text-amber-800 font-bold text-xs px-2.5 py-0.5 rounded-full">3 Left</span>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-50 border border-slate-100">
                                    <div class="mt-0.5 text-amber-500">📌</div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Follow up patient</p>
                                        <p class="text-muted mt-0.5">Check recovery status of post-op cases.</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-50 border border-slate-100">
                                    <div class="mt-0.5 text-amber-500">💊</div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Prescription Renewal</p>
                                        <p class="text-muted mt-0.5">Approve maintenance medication extensions.</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-3 rounded-xl bg-slate-50 border border-slate-100">
                                    <div class="mt-0.5 text-amber-500">📝</div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Unfinished doctor's notes</p>
                                        <p class="text-muted mt-0.5">Complete diagnostics write-ups from yesterday.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-50 mt-6">
                            <a href="/doctor/patients" class="btn-blue w-full">
                                Manage Patient Directory
                            </a>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>

</body>
</html>

<style>
    /* Global Page Background */
    body {
        background-color: #f0f4fa;
        color: #475569;
    }

    /* Shared Card Style (White Boxes) */
    .hospital-card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 24px;
    }

    /* Shared Blue Button Style */
    .btn-blue {
        background-color: #2563eb;
        color: #ffffff;
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 12px;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .btn-blue:hover {
        background-color: #1d4ed8;
    }

    /* Mini Gray Label Text */
    .text-muted {
        color: #94a3b8;
        font-size: 12px;
    }
</style>