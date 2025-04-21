<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #d1c4e9, #b39ddb);
            color: #4a148c;
            line-height: 1.6;
            padding: 30px;
            transition: background-color 0.3s ease;
        }

        h1, h2, h3, h4 {
            color: #4a148c;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 700;
            color: #4a148c;
        }

        h2 {
            border-bottom: 2px solid #6a1b9a;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        h3 {
            margin-top: 0;
            margin-bottom: 1rem;
            font-weight: 500;
            font-size: 1.2em;
            color: #6a1b9a;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .dashboard-content {
            margin-top: 2rem;
        }

        .admin-dashboard,
        .bank-dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(min(400px, 100%), 1fr));
            gap: 30px;
        }

        .admin-dashboard > h2 {
            grid-column: 1 / -1;
            border-bottom-color: #ff7043;
        }
        .bank-dashboard > h2 {
            grid-column: 1 / -1;
            border-bottom-color: #29b6f6;
        }

        .section {
            background: #faf7ff;
            padding: 25px 30px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .admin-dashboard .section,
        .bank-dashboard .section {
            margin-bottom: 0;
        }

        .siswa-dashboard .section:first-child h2 {
             font-size: 1.5em;
             margin-bottom: 1.5rem;
             padding-bottom: 0;
             border-bottom: none;
             color: #6a1b9a;
        }

        .action-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin-bottom: 30px;
        }

        .action-row > .section {
            flex: 1 1 0;
            min-width: 250px;
            margin-bottom: 0 !important;
        }

        @media (max-width: 767px) {
            .action-row {
                 flex-direction: column;
            }
            .action-row > .section {
                min-width: 100%;
            }
        }

        .siswa-dashboard > .section {
            margin-bottom: 30px;
        }
        .siswa-dashboard > *:last-child {
             margin-bottom: 0;
        }


        ul { list-style: none; padding-left: 0; margin-top: 15px; }
        li { padding: 12px 15px; border-bottom: 1px solid #eaeaea; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; }
        li:last-child { border-bottom: none; }
        li .user-info { flex-grow: 1; margin-right: 15px; word-break: break-word; }

        input, select, button { padding: 10px 12px; margin: 0; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; transition: border-color 0.3s ease, box-shadow 0.3s ease; }
        input:focus, select:focus { border-color: #6a1b9a; outline: none; box-shadow: 0 0 0 2px rgba(106, 27, 154, 0.2); }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; }
        input[type="number"] { width: 150px; }
        select { width: 100%; }

        button { background-color: #6a1b9a; color: #ffffff; cursor: pointer; border: none; font-weight: 500; transition: background-color 0.3s ease; }
        button:hover { background-color: #8242aa; }
        .btn-danger { background-color: #e74c3c; }
        .btn-danger:hover { background-color: #c0392b; }
        .btn-small { padding: 6px 10px; font-size: 13px; }

        .alert { background-color: #dff0d8; color: #3c763d; padding: 15px 20px; border-radius: 6px; margin-bottom: 25px; border: 1px solid #c3e6cb; font-weight: 500; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); }
        form { margin-bottom: 10px; }

        form.inline { display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-left: 0; margin-bottom: 0; }
        form.inline input, form.inline select, form.inline button { margin: 0; flex-grow: 1; min-width: 120px; }
        form.inline input[type="text"], form.inline input[type="email"] { min-width: 150px; }
        form.inline select { min-width: 100px; flex-grow: 0.5; }
        form.inline button { flex-grow: 0; }

        .form-group { margin-bottom: 15px; display: flex; flex-direction: column; }
        .form-group label { margin-bottom: 5px; font-weight: 500; font-size: 14px; color: #6a1b9a; }
        .form-group input, .form-group select { width: 100%; }

        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 20px; margin-bottom: 15px; }
        .stat-item { background-color: #f5f7fa; padding: 15px; border-radius: 6px; text-align: center; border: 1px solid #eaeaea; }
        .stat-item strong { display: block; font-size: 1.4em; margin-bottom: 5px; color: #6a1b9a; }
        .stat-item span { font-size: 0.9em; color: #555; }

        .table-container { overflow-x: auto; margin-top: 15px; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; border: 1px solid #eaeaea; border-radius: 6px; overflow: hidden; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eaeaea; }
        th:last-child, td:last-child { text-align: right; }
        td:nth-last-child(2) { text-align: right; }
        thead tr { background-color: #eef5f9; color: #34495e; font-weight: 500; border-bottom: 2px solid #eaeaea; }
        tbody tr:nth-of-type(even) { background-color: #fbfcfd; }
        tbody tr:hover { background-color: #f1f8fd; }

        .actions-group { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; }
        .actions-group form.inline { width: 100%; }

        @media (min-width: 992px) {
            li { align-items: center; }
            li .user-info { margin-bottom: 0; }
            .actions-group { flex-wrap: nowrap; }
            .actions-group form.inline { width: auto; }
            form.inline input, form.inline select { margin-bottom: 0; }
        }
        .actions-group form { margin-bottom: 0; }

        .logout-button { position: absolute; top: 25px; right: 30px; z-index: 10; }

        @media print {
            html, body { margin: 0 !important; padding: 0 !important; background: #ffffff !important; height: auto !important; overflow: visible !important; font-size: 10pt; }
            body * { visibility: hidden; }

            #print-area, #print-area *, #print-area-bank, #print-area-bank *, #print-area-siswa, #print-area-siswa * { visibility: visible !important; }

            #print-area, #print-area-bank, #print-area-siswa { position: static !important; display: block !important; width: 100% !important; padding: 0 !important; margin: 0 !important; background: none !important; box-shadow: none !important; border: none !important; page-break-before: avoid; }

            .section:has(#print-area), .section:has(#print-area-bank), .section:has(#print-area-siswa) { visibility: visible !important; display: block !important; position: static !important; border: none !important; box-shadow: none !important; padding: 0 !important; margin: 0 !important; width: 100% !important; page-break-inside: avoid; }

            .section:has(#print-area) h3, .section:has(#print-area-bank) h3, .section:has(#print-area-siswa) h3, .section:has(#print-area-siswa) h2 { display: block !important; visibility: visible !important; text-align: center !important; margin-top: 10pt !important; margin-bottom: 1.5rem !important; font-size: 14pt !important; font-weight: 600 !important; color: #000 !important; width: 100% !important; border-bottom: none !important; padding-bottom: 0 !important; }
             .section:has(#print-area-siswa) h2 { font-size: 16pt !important; }

            table { visibility: visible !important; box-shadow: none !important; border: 1px solid #ccc !important; font-size: 10pt !important; margin-top: 0 !important; width: 100% !important; border-collapse: collapse !important; }
            th, td { visibility: visible !important; padding: 6px 8px !important; border: 1px solid #ccc !important; color: #000 !important; text-align: left !important; word-wrap: break-word; }
            thead tr { visibility: visible !important; background-color: #eee !important; color: #000 !important; font-weight: bold; }
            tbody tr { visibility: visible !important; background-color: #ffffff !important; }
            tbody tr:nth-of-type(even) { background-color: #f9f9f9 !important; }
            td:nth-last-child(n+1):nth-last-child(-n+2) { text-align: right !important; }
            td:nth-child(2), td:nth-child(3) { white-space: nowrap; }

            .container, .dashboard-content { visibility: visible !important; margin: 0 !important; padding: 0 !important; border: none !important; box-shadow: none !important; background: none !important; }

            .section:not(:has(#print-area)):not(:has(#print-area-bank)):not(:has(#print-area-siswa)),
            h1, h4,
            .admin-dashboard > h2, .bank-dashboard > h2,
            .logout-button,
            button.no-print,
            form:not(#print-area form):not(#print-area-bank form):not(#print-area-siswa form),
            input, select, .alert, .stats-grid,
            .action-row,
            ul:not(#print-area ul):not(#print-area-bank ul):not(#print-area-siswa ul),
            li:not(#print-area li):not(#print-area-bank li):not(#print-area-siswa li),
            .section:has(#print-area) > *:not(h3):not(#print-area),
            .section:has(#print-area-bank) > *:not(h3):not(#print-area-bank),
            .section:has(#print-area-siswa) > *:not(h2):not(h3):not(#print-area-siswa)
            {
                display: none !important;
                visibility: hidden !important;
                margin: 0 !important;
                padding: 0 !important;
                height: 0 !important;
                overflow: hidden !important;
                border: none !important;
                position: absolute;
                left: -9999px;
            }
        }
    </style>

</head>

<body class="{{ Auth::check() ? 'role-' . strtolower(Auth::user()->role) : '' }}">

    <div class="container">
        <h1>Dashboard</h1>
        @if (session('status'))
            <div class="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (Auth::user())
            <form action="{{ route('logout') }}" method="POST" class="logout-button no-print">
                @csrf
                <button type="submit" class="btn-danger btn-small">LOGOUT</button>
            </form>
            @if(Auth::user()->role === 'admin')
                <div class="dashboard-content admin-dashboard">
                    <h2>Admin Dashboard</h2>
                    <div class="section">
                        <h3>Ringkasan</h3>
                        <div class="stats-grid">
                             <div class="stat-item">
                                 <strong>{{ $user }}</strong>
                                 <span>Total Users</span>
                             </div>
                        </div>
                    </div>
                    <div class="section">
                        <h3>Tambah Pengguna Baru</h3>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="admin_create_name">Nama</label>
                                <input id="admin_create_name" type="text" name="name" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="admin_create_email">Email</label>
                                <input id="admin_create_email" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                 <label for="admin_create_password">Password</label>
                                <input id="admin_create_password" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                 <label for="admin_create_role">Role</label>
                                <select id="admin_create_role" name="role" required>
                                    <option value="" disabled selected>Pilih Role</option>
                                    <option value="siswa">Siswa</option>
                                    <option value="bank">Bank</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <button type="submit">Tambah Pengguna</button>
                        </form>
                    </div>
                    <div class="section">
                        <h3>Daftar Semua Pengguna</h3>
                        <ul>
                            @foreach($userAll as $u)
                                <li>
                                    <div class="user-info">
                                        {{ $u->name }} ({{ $u->email }}) <br> <strong>Role:</strong> {{ ucfirst($u->role) }}
                                    </div>
                                    <div class="actions-group">
                                        <form action="{{ route('users.update', $u->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="text" name="name" value="{{ $u->name }}" required title="Nama">
                                            <input type="email" name="email" value="{{ $u->email }}" required title="Email">
                                            <select name="role" title="Role">
                                                <option value="siswa" {{ $u->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                                <option value="bank" {{ $u->role == 'bank' ? 'selected' : '' }}>Bank</option>
                                                <option value="admin" {{ $u->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>

                                            <div style="margin-top: 10px;">
                                            <button type="submit" class="btn-small" style="display: inline-block;">Update</button>
                                        </form>
                                                <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display: inline-block; margin-left: 5px;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn-danger btn-small" onclick="return confirm('Yakin ingin menghapus pengguna {{ $u->name }}?')">Hapus</button>
                                                </form>
                                            </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="section">
                        <h3>Riwayat Transaksi Sistem</h3>
                         <button onclick="printContent('print-area')" class="no-print">Cetak Riwayat</button>
                         <div id="print-area">
                             <div class="table-container">
                                <table>
                                    <thead>
                                        <tr><th>Tanggal</th><th>Credit</th><th>Debit</th><th>Status</th><th>User</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mutasi as $m)
                                            <tr>
                                                <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                                                <td>Rp{{ number_format($m->credit ?? 0, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($m->debit ?? 0, 0, ',', '.') }}</td>
                                                <td>{{ ucfirst($m->status ?? 'Selesai') }}</td>
                                                <td>{{ $m->user->name ?? 'N/A' }}</td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5" style="text-align: center;">Tidak ada riwayat transaksi.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif(Auth::user()->role === 'bank')
                 <div class="dashboard-content bank-dashboard">
                    <h2>Bank Dashboard</h2>
                     <div class="section">
                         <h3>Ringkasan Bank</h3>
                         <div class="stats-grid">
                            <div class="stat-item"><strong>Rp{{ number_format($saldo ?? 0, 0, ',', '.') }}</strong><span>Saldo Bank</span></div>
                            <div class="stat-item"><strong>Rp{{ number_format($credit ?? 0, 0, ',', '.') }}</strong><span>Total Kredit Disetujui</span></div>
                            <div class="stat-item"><strong>Rp{{ number_format($debit ?? 0, 0, ',', '.') }}</strong><span>Total Debit Disetujui</span></div>
                            <div class="stat-item"><strong>{{ $nasabah ?? 0 }}</strong><span>Jumlah Nasabah (Siswa)</span></div>
                            <div class="stat-item"><strong>{{ $allmutasi ?? 0 }}</strong><span>Transaksi Selesai</span></div>
                        </div>
                     </div>
                    <div class="section">
                        <h3>Tambah Siswa Baru</h3>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="bank_create_siswa_name">Nama Siswa</label>
                                <input type="text" id="bank_create_siswa_name" name="name" placeholder="Nama Lengkap Siswa" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_create_siswa_email">Email Siswa</label>
                                <input type="email" id="bank_create_siswa_email" name="email" placeholder="Email Siswa" required>
                            </div>
                            <div class="form-group">
                                <label for="bank_create_siswa_password">Password Awal</label>
                                <input type="password" id="bank_create_siswa_password" name="password" placeholder="Password Awal" required>
                            </div>
                            <input type="hidden" name="role" value="siswa">
                            <button type="submit">Tambah Siswa</button>
                        </form>
                    </div>
                    <div class="section">
                        <h3>Top Up Saldo Siswa</h3>
                        <form action="{{ route('wallet.topupForSiswa') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="bank_topup_siswa_id">Pilih Siswa</label>
                                <select id="bank_topup_siswa_id" name="siswa_id" required>
                                    <option value="" disabled selected>Pilih Siswa</option>
                                    @foreach ($users as $u) <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option> @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bank_topup_credit">Jumlah Top Up</label>
                                <input id="bank_topup_credit" type="number" name="credit" min="5000" placeholder="Jumlah (min 5000)" required>
                            </div>
                            <button type="submit">Top Up Siswa</button>
                        </form>
                    </div>
                    <div class="section">
                        <h3>Tarik Saldo Siswa</h3>
                        <form action="{{ route('wallet.withdrawForSiswa') }}" method="POST">
                            @csrf
                             <div class="form-group">
                                <label for="bank_withdraw_siswa_id">Pilih Siswa</label>
                                <select id="bank_withdraw_siswa_id" name="siswa_id" required>
                                     <option value="" disabled selected>Pilih Siswa</option>
                                    @foreach ($users as $u) <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option> @endforeach
                                </select>
                             </div>
                            <div class="form-group">
                                <label for="bank_withdraw_debit">Jumlah Penarikan</label>
                                <input id="bank_withdraw_debit" type="number" name="debit" min="5000" placeholder="Jumlah (min 5000)" required>
                            </div>
                            <button type="submit">Tarik dari Siswa</button>
                        </form>
                    </div>
                    <div class="section">
                        <h3>Transaksi Menunggu Persetujuan</h3>
                        <ul>
                            @forelse($recent_payment as $rp)
                                <li>
                                    <div class="user-info">
                                        {{ $rp->created_at->format('d M Y H:i') }} - {{ $rp->user->name ?? 'Unknown User' }} <br>
                                        @if($rp->credit > 0) Request Top Up: <strong>Rp{{ number_format($rp->credit, 0, ',', '.') }}</strong>
                                        @elseif($rp->debit > 0) Request Penarikan: <strong>Rp{{ number_format($rp->debit, 0, ',', '.') }}</strong>
                                        @endif
                                         - Status: <span style="font-weight: bold; color: orange;">{{ ucfirst($rp->status) }}</span>
                                    </div>
                                    <form action="{{ route('wallet.accept') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="wallet_id" value="{{ $rp->id }}">
                                        <button type="submit" class="btn-small">Setujui</button>
                                    </form>
                                </li>
                            @empty
                                 <li>Tidak ada transaksi yang menunggu persetujuan.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="section">
                        <h3>Riwayat Transaksi Bank (Disetujui)</h3>
                         <button onclick="printContent('print-area-bank')" class="no-print">Cetak Riwayat Bank</button>
                        <div id="print-area-bank">
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr><th>Tanggal</th><th>Credit</th><th>Debit</th><th>Status</th><th>User Terkait</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mutasi as $m)
                                            <tr>
                                                <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                                                <td>Rp{{ number_format($m->credit ?? 0, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($m->debit ?? 0, 0, ',', '.') }}</td>
                                                <td>{{ ucfirst($m->status ?? 'Selesai') }}</td>
                                                <td>{{ $m->user->name ?? 'N/A' }}</td>
                                            </tr>
                                         @empty
                                            <tr><td colspan="5" style="text-align: center;">Tidak ada riwayat transaksi yang disetujui.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div>
                </div>

            @elseif(Auth::user()->role === 'siswa')
                <div class="dashboard-content siswa-dashboard">
                    <div class="section">
                         <h2>Selamat datang, {{ Auth::user()->name }}</h2>
                         <div class="stats-grid">
                             <div class="stat-item">
                                <strong>Rp{{ number_format($saldo ?? 0, 0, ',', '.') }}</strong>
                                <span>Saldo Saat Ini</span>
                             </div>
                         </div>
                     </div>

                     <div class="section">
                        <h3>Riwayat Transaksi Anda</h3>
                        <button onclick="printContent('print-area-siswa')" class="no-print">Cetak Riwayat</button>
                        <div id="print-area-siswa">
                             <div class="table-container">
                                <table>
                                    <thead>
                                        <tr><th>Tanggal</th><th>Credit</th><th>Debit</th><th>Status</th><th>Deskripsi</th></tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mutasi as $m)
                                            <tr>
                                                <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                                                <td>Rp{{ number_format($m->credit ?? 0, 0, ',', '.') }}</td>
                                                <td>Rp{{ number_format($m->debit ?? 0, 0, ',', '.') }}</td>
                                                <td>{{ ucfirst($m->status ?? 'Selesai') }}</td>
                                                <td>{{ $m->description ?? '-' }}</td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="5" style="text-align: center;">Tidak ada riwayat transaksi.</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>

                    <div class="section">
                        <h3>Transfer ke Teman</h3>
                        <form action="{{ route('wallet.transfer') }}" method="POST">
                            @csrf
                             <div class="form-group">
                                <label for="siswa_transfer_recipient">Pilih Penerima</label>
                                <select id="siswa_transfer_recipient" name="recipient_id" required>
                                    <option value="" disabled selected>Pilih Penerima</option>
                                    @foreach($users as $u)
                                        @if($u->id !== Auth::id())
                                        <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                                        @endif
                                    @endforeach
                                </select>
                             </div>
                             <div class="form-group">
                                <label for="siswa_transfer_amount">Jumlah Transfer</label>
                                <input id="siswa_transfer_amount" type="number" name="amount" min="5000" placeholder="Jumlah (min 5000)" required>
                             </div>
                            <button type="submit">Kirim Transfer</button>
                        </form>
                    </div>

                    <div class="action-row">
                        <div class="section">
                            <h3>Top Up Saldo</h3>
                            <form action="{{ route('wallet.topup') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="siswa_topup_credit">Jumlah Top Up</label>
                                    <input id="siswa_topup_credit" type="number" name="credit" min="5000" placeholder="Jumlah Top Up (min 5000)" required>
                                </div>
                                <button type="submit">Request Top Up</button>
                                <small style="display: block; margin-top: 10px; color: #777;">Top up memerlukan persetujuan Bank.</small>
                            </form>
                        </div>

                        <div class="section">
                            <h3>Tarik Saldo</h3>
                            <form action="{{ route('wallet.withdraw') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="siswa_withdraw_debit">Jumlah Penarikan</label>
                                    <input id="siswa_withdraw_debit" type="number" name="debit" min="5000" placeholder="Jumlah Penarikan (min 5000)" required>
                                </div>
                                <button type="submit">Request Penarikan</button>
                                <small style="display: block; margin-top: 10px; color: #777;">Penarikan memerlukan persetujuan Bank.</small>
                            </form>
                        </div>
                    </div>

                </div>
            @endif
        @endif
    </div>

    <script>
        function printContent(elementId) {
            document.body.classList.add('printing');

            setTimeout(() => {
                window.print();
                 setTimeout(() => {
                      document.body.classList.remove('printing');
                 }, 500);
            }, 100);
        }

        const deleteForms = document.querySelectorAll('form[method="POST"]');
        deleteForms.forEach(form => {
            const deleteMethodInput = form.querySelector('input[name="_method"][value="DELETE"]');
            const deleteButton = form.querySelector('button.btn-danger');

            if (deleteMethodInput && deleteButton) {
                if (!deleteButton.getAttribute('onclick')) {
                    deleteButton.addEventListener('click', function(event) {
                        let confirmMessage = 'Apakah Anda yakin ingin menghapus item ini?';
                        const nameInput = form.parentNode.querySelector('input[name="name"]');
                        if (nameInput && nameInput.value) {
                             confirmMessage = `Yakin ingin menghapus pengguna ${nameInput.value}?`;
                        } else {
                             const userInfoDiv = form.closest('li')?.querySelector('.user-info');
                             if (userInfoDiv && userInfoDiv.textContent.includes('(')) {
                                 const nameMatch = userInfoDiv.textContent.match(/^(.*?)\s+\(/);
                                 if (nameMatch && nameMatch[1]) {
                                     confirmMessage = `Yakin ingin menghapus pengguna ${nameMatch[1].trim()}?`;
                                 }
                             }
                        }

                        if (!confirm(confirmMessage)) {
                            event.preventDefault();
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>
