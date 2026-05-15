@extends('layouts.app')

@section('content')

<div class="nom-page">

    {{-- Glow blobs --}}
    <div class="nom-glow-wrap" aria-hidden="true">
        <div class="nom-glow nom-glow-tr"></div>
        <div class="nom-glow nom-glow-bl"></div>
    </div>

    <div class="nom-container">

        {{-- ── HEADER ───────────────────────────────────────────────────── --}}
        <div class="nom-header">
            <h1 class="nom-title">
                Nominate a <span class="nom-title-accent">Star</span>
            </h1>
            <p class="nom-subtitle">Recognizing excellence that shapes the future</p>
        </div>

        {{-- ── FLASH MESSAGES ───────────────────────────────────────────── --}}
        @if(session('success'))
            <div class="nom-alert nom-alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="nom-alert nom-alert-error">{{ session('error') }}</div>
        @endif

        {{-- ── FORM CARD ─────────────────────────────────────────────────── --}}
        <div class="nom-card">

            <form id="nominationForm"
                  action="{{ route('nomination.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                {{-- ── CONTACT INFO ────────────────────────────────────── --}}
                <div class="nom-grid nom-mb">
                    <div>
                        <label class="luminous-label">Email</label>
                        <input type="email" name="email" id="nom-email"
                               class="luminous-input" required autocomplete="email"
                               placeholder="you@example.com"
                               value="{{ old('email') }}">
                    </div>
                    <div>
                        <label class="luminous-label">Phone</label>
                        <input type="text" name="phone" id="nom-phone"
                               class="luminous-input" required autocomplete="tel"
                               placeholder="+254 700 000 000"
                               value="{{ old('phone') }}">
                    </div>
                </div>

                {{-- ── ACCOUNT PANEL ───────────────────────────────────── --}}
                <div id="accountPanel" class="acct-panel hidden nom-mb">

                    <p class="acct-eyebrow">Your account</p>
                    <p class="acct-desc">
                        Log in or create an account to track your nomination.
                        Skip and we'll email your login details automatically.
                    </p>

                    <div class="acct-tabs" id="accountTabs">
                        <button type="button" data-tab="login"
                            class="account-tab active-tab">Log in</button>
                        <button type="button" data-tab="register"
                            class="account-tab">Create account</button>
                        <button type="button" data-tab="skip"
                            class="account-tab acct-tab-skip">Skip — email me</button>
                    </div>

                    {{-- Login --}}
                    <div id="tab-login" class="acct-tab-panel">
                        <div class="nom-grid">
                            <div>
                                <label class="luminous-label">Email</label>
                                <input type="email" id="login-email" class="luminous-input"
                                       placeholder="you@example.com" autocomplete="email">
                            </div>
                            <div>
                                <label class="luminous-label">Password</label>
                                <input type="password" id="login-password" class="luminous-input"
                                       placeholder="••••••••" autocomplete="current-password">
                            </div>
                        </div>
                        <button type="button" id="doLogin" class="acct-action-btn">
                            Log in &amp; continue
                        </button>
                        <p id="login-error" class="acct-error"></p>
                    </div>

                    {{-- Register --}}
                    <div id="tab-register" class="acct-tab-panel hidden">
                        <div class="nom-grid">
                            <div>
                                <label class="luminous-label">Password</label>
                                <input type="password" id="reg-password" class="luminous-input"
                                       placeholder="Min 8 characters" autocomplete="new-password">
                            </div>
                            <div>
                                <label class="luminous-label">Confirm password</label>
                                <input type="password" id="reg-confirm" class="luminous-input"
                                       placeholder="Repeat password" autocomplete="new-password">
                            </div>
                        </div>
                        <button type="button" id="doRegister" class="acct-action-btn">
                            Create account &amp; continue
                        </button>
                        <p id="register-error" class="acct-error"></p>
                    </div>

                    {{-- Skip --}}
                    <div id="tab-skip" class="acct-tab-panel hidden">
                        <p class="acct-skip-text">
                            We'll generate secure credentials and email them to
                            <span id="skip-email-display" class="acct-skip-email"></span>.
                            Use them to log in and track your nomination anytime.
                        </p>
                        <p class="acct-skip-sub">No extra steps — just submit the form.</p>
                    </div>

                    {{-- Authed --}}
                    <div id="tab-authed" class="acct-tab-panel hidden">
                        <div class="acct-authed-row">
                            <div class="acct-authed-check">✓</div>
                            <div class="acct-authed-info">
                                <p class="acct-authed-name" id="authed-name"></p>
                                <p class="acct-authed-sub">Nomination will be linked to your account</p>
                            </div>
                            <button type="button" id="doLogout" class="acct-authed-change">Change</button>
                        </div>
                    </div>

                    <input type="hidden" name="account_action"  id="account_action"  value="skip">
                    <input type="hidden" name="account_user_id" id="account_user_id" value="">
                </div>

                {{-- ── STAR NAME ───────────────────────────────────────── --}}
                <div class="nom-mb">
                    <label class="luminous-label">Star Name</label>
                    <input type="text" name="name" class="luminous-input" required
                           placeholder="Full name of person or brand"
                           value="{{ old('name') }}">
                </div>

                {{-- ── SOCIAL HANDLES ──────────────────────────────────── --}}
                <div class="nom-mb">
                    <label class="luminous-label">Social Handles</label>
                   <div id="socialWrapper" class="social-stack">
    <div class="social-row">
        <select name="socials[0][platform]" class="luminous-input social-platform">
            <option>Facebook</option>
            <option>Instagram</option>
            <option>TikTok</option>
            <option>Twitter</option>
            <option>LinkedIn</option>
            <option>YouTube</option>
        </select>

        <input name="socials[0][handle]" 
               class="luminous-input social-handle"
               placeholder="@username">

        <button type="button" class="remove-social">✕</button>
    </div>
</div>

<button type="button" id="addSocial" class="social-add-btn">
    + Add Social
</button>
                </div>

                {{-- ── CATEGORY ────────────────────────────────────────── --}}
                <div class="nom-grid nom-mb">
                    <div>
                        <label class="luminous-label">Category</label>
                        <select name="category_id" id="main-category" class="luminous-input" required>
                            <option value="" disabled selected>Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="luminous-label">Sub Category</label>
                        <select name="sub_category_id" id="sub-category"
                                class="luminous-input" disabled required>
                            <option value="" disabled selected>Select Sub Category</option>
                        </select>
                    </div>
                </div>

                {{-- ── REASON ──────────────────────────────────────────── --}}
                <div class="nom-mb">
                    <label class="luminous-label">Why They Deserve It</label>
                   
    <textarea name="reason" id="reason" rows="4" class="luminous-input" required
        placeholder="Tell us why this person deserves recognition...">{{ old('reason') }}</textarea>

    <small id="wordCount" style="display:block;margin-top:5px;color:#888;">
        Words: 0 / 200 (min 80)
    </small>

                </div>

                {{-- ── IMAGE / CROP ─────────────────────────────────────── --}}
                <div class="nom-mb">
                    <label class="luminous-label">Today's Star — Portrait</label>

                    {{-- Dropzone --}}
                    <div id="dropzone" class="nom-dropzone">
                        <div class="nom-drop-icon">
                            
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.502 5.502 0 00-10.78 2.22A4.5 4.5 0 003 15z"/>
                            </svg>
                        </div>
                        <p class="nom-drop-label">Click or drag image here</p>
                        <p class="nom-drop-sub">Portrait recommended · 4:5 ratio · Drag to reposition after selecting</p>
                    </div>

                    {{-- Crop stage --}}
                    <div id="cropStage" class="hidden nom-crop-stage">
                        <div class="nom-crop-wrap">
                            <canvas id="cropCanvas" width="320" height="400"
                                    class="nom-crop-canvas"></canvas>
                        </div>
                        <p class="nom-crop-hint">Drag to reposition · Pinch or scroll to zoom</p>
                        <div class="nom-crop-actions">
                            <button id="confirmCrop" type="button" class="nom-crop-confirm">Confirm</button>
                            <button id="cancelCrop"  type="button" class="nom-crop-cancel">Cancel</button>
                        </div>
                    </div>

                    {{-- Upload progress --}}
                    <div id="uploadBox" class="hidden nom-upload-box">
                        <div class="nom-upload-track">
                            <div id="bar" class="nom-upload-bar"></div>
                        </div>
                        <p id="percent" class="nom-upload-pct">Uploading 0%</p>
                    </div>

                    {{-- Final preview --}}
                    <div id="finalPreview" class="hidden"></div>

                    <input type="hidden" name="cropped_image" id="croppedImage">
                </div>

                {{-- ── SUBMIT ──────────────────────────────────────────── --}}
                <button type="submit" id="submit-btn" class="nom-submit" disabled>
                    Submit Nomination
                </button>

            </form>
        </div>{{-- /.nom-card --}}
    </div>{{-- /.nom-container --}}
</div>{{-- /.nom-page --}}


{{-- ══════════════════════════════════════════════════════════════════════ --}}
{{-- STYLES                                                                  --}}
{{-- ══════════════════════════════════════════════════════════════════════ --}}
<style>

/* ── PAGE ─────────────────────────────────────────────────────────────── */
.nom-page {
    min-height: 100vh;
    background: radial-gradient(circle at top, #0b1220, #05070d);
    color: #e5e7eb;
    font-family: ui-sans-serif, system-ui, -apple-system, sans-serif;
    padding: 5rem 1rem 4rem;
    position: relative;
    overflow: hidden;
}

/* Glow blobs */
.nom-glow-wrap { position: absolute; inset: 0; pointer-events: none; }
.nom-glow { position: absolute; border-radius: 50%; }
.nom-glow-tr {
    top: -10%; right: -10%;
    width: 500px; height: 500px;
    background: rgba(245,158,11,0.08);
    filter: blur(140px);
}
.nom-glow-bl {
    bottom: -20%; left: -10%;
    width: 600px; height: 600px;
    background: rgba(234,179,8,0.04);
    filter: blur(160px);
}

/* ── LAYOUT ───────────────────────────────────────────────────────────── */
.nom-container {
    max-width: 860px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
.nom-mb { margin-bottom: 1.5rem; }

/* ── HEADER ───────────────────────────────────────────────────────────── */
.nom-header {
    text-align: center;
    margin-bottom: 2.5rem;
}
.nom-title {
    font-size: clamp(2.25rem, 6vw, 3.75rem);
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    color: #fff;
    line-height: 1.1;
    margin: 0 0 0.4rem;
}
.nom-title-accent {
    color: #f59e0b;
    font-style: italic;
}
.nom-subtitle {
    color: #64748b;
    font-size: 0.9rem;
    font-style: italic;
}

/* ── FLASH MESSAGES ───────────────────────────────────────────────────── */
.nom-alert {
    border-radius: 14px;
    padding: 14px 18px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 1.5rem;
}
.nom-alert-success {
    background: rgba(16,185,129,0.12);
    border: 1px solid rgba(16,185,129,0.3);
    color: #34d399;
}
.nom-alert-error {
    background: rgba(239,68,68,0.10);
    border: 1px solid rgba(239,68,68,0.28);
    color: #f87171;
}

/* ── CARD ─────────────────────────────────────────────────────────────── */
.nom-card {
    background: rgba(17,24,39,0.70);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 2.25rem;
    padding: 2.5rem 3rem;
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    box-shadow: 0 24px 64px rgba(0,0,0,0.45);
}
@media (max-width: 768px) {
    .nom-card { padding: 1.5rem 1.25rem; border-radius: 1.5rem; }
}

/* ── GRID ─────────────────────────────────────────────────────────────── */
.nom-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
}
@media (max-width: 640px) {
    .nom-grid { grid-template-columns: 1fr; }
}

/* ── LABELS ───────────────────────────────────────────────────────────── */
.luminous-label {
    display: block;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.24em;
    color: #64748b;
    margin-bottom: 0.5rem;
}

/* ── INPUTS ───────────────────────────────────────────────────────────── */
/* INPUTS + SELECTS + TEXTAREA */
.luminous-input {
    width: 100%;
    box-sizing: border-box;
    background: rgba(16,185,129,0.12);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 14px;
    padding: 13px 15px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #000; /* typed text */
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    appearance: none;
    -webkit-appearance: none;
}

/* Placeholder text */
.luminous-input::placeholder {
    color: #6b7280;
    font-weight: 500;
}

/* Select default option text */
.luminous-input option {
    background: #000;
    color: #9ca3af;
}

/* When focused */
.luminous-input:focus {
    border-color: #ef4444;
    box-shadow: 0 0 0 3px rgba(239,68,68,0.15);
}

/* Disabled select */
.luminous-input:disabled {
    background: #111827;
    color: #6b7280;
    cursor: not-allowed;
}
select.luminous-input {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    padding-right: 36px;
    cursor: pointer;
}
select.luminous-input option { background: #0f172a; color: #e2e8f0; }
textarea.luminous-input { resize: vertical; min-height: 110px; line-height: 1.6; }

@media (max-width: 480px) {
    .luminous-input { padding: 11px 12px; font-size: 0.875rem; border-radius: 12px; }
}

.social-stack{
    display:flex;
    flex-direction:column;
    gap:14px;
}

.social-row{
    display:flex;
    align-items:center;
    gap:12px;
    width:100%;
}

/* 50/50 layout */
.social-platform,
.social-handle{
    flex:1 1 50%;
    width:50%;
    min-width:0;
}

/* remove button */
.remove-social{
    width:48px;
    height:48px;
    min-width:48px;
    border:none;
    border-radius:16px;
    background:#1e293b;
    color:#ef4444;
    font-size:20px;
    cursor:pointer;
    transition:0.25s;
}

.remove-social:hover{
    background:#ef4444;
    color:white;
}

/* add button */
.social-add-btn{
    margin-top:14px;
    font-size:11px;
    font-weight:800;
    letter-spacing:0.25em;
    text-transform:uppercase;
    color:#f59e0b;
    background:transparent;
    border:none;
    cursor:pointer;
}

/* mobile responsive */
@media(max-width:640px){

    .social-row{
        flex-wrap:wrap;
    }

    .social-platform,
    .social-handle{
        width:100%;
        flex:1 1 100%;
    }

    .remove-social{
        width:100%;
        height:44px;
    }
}
@media (max-width: 420px) {
    .social-row { flex-wrap: wrap; }
    .social-platform { width: 100%; }
}

/* ── ACCOUNT PANEL ────────────────────────────────────────────────────── */
.acct-panel {
    border: 1px solid rgba(197,160,89,0.18);
    border-radius: 18px;
    background: rgba(245,158,11,0.04);
    padding: 1.25rem 1.5rem;
}
.acct-eyebrow {
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.22em;
    color: #f59e0b;
    margin: 0 0 4px;
}
.acct-desc {
    color: #475569;
    font-size: 13px;
    line-height: 1.6;
    margin: 0 0 1rem;
}

/* Tabs */
.acct-tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 1rem;
}
.account-tab {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(197,160,89,0.18);
    color: #64748b;
    padding: 7px 14px;
    border-radius: 10px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.13em;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
}
.account-tab:hover { border-color: rgba(197,160,89,0.35); color: #94a3b8; }
.account-tab.active-tab {
    background: rgba(245,158,11,0.14);
    border-color: rgba(245,158,11,0.48);
    color: #f59e0b;
}
.acct-tab-skip { margin-left: auto; opacity: 0.65; }
.acct-tab-skip:hover,
.acct-tab-skip.active-tab { opacity: 1; }

@media (max-width: 480px) {
    .acct-tab-skip { margin-left: 0; width: 100%; text-align: center; }
}

/* Tab panels */
.acct-tab-panel { display: block; }
.acct-tab-panel.hidden { display: none; }

/* Action button */
.acct-action-btn {
    display: inline-block;
    margin-top: 12px;
    padding: 9px 22px;
    border-radius: 999px;
    background: #f59e0b;
    color: #000;
    font-size: 11px;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 0.17em;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s, transform 0.15s;
}
.acct-action-btn:hover  { opacity: 0.88; }
.acct-action-btn:active { transform: scale(0.97); }

/* Errors */
.acct-error {
    font-size: 12px;
    color: #f87171;
    margin-top: 8px;
    min-height: 18px;
}

/* Skip text */
.acct-skip-text { color: #475569; font-size: 13px; line-height: 1.65; }
.acct-skip-email { color: #f59e0b; font-weight: 700; }
.acct-skip-sub   { color: #334155; font-size: 12px; margin-top: 6px; }

/* Authed state */
.acct-authed-row {
    display: flex;
    align-items: center;
    gap: 12px;
}
.acct-authed-check {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(245,158,11,0.15);
    color: #f59e0b;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}
.acct-authed-info { flex: 1; min-width: 0; }
.acct-authed-name { font-size: 14px; font-weight: 700; color: #f1f5f9; margin: 0; }
.acct-authed-sub  { font-size: 12px; color: #475569; margin-top: 2px; }
.acct-authed-change {
    background: none;
    border: none;
    color: #f87171;
    font-size: 12px;
    text-decoration: underline;
    cursor: pointer;
    flex-shrink: 0;
}

/* ── DROPZONE ─────────────────────────────────────────────────────────── */
.nom-dropzone {
    border: 1.5px dashed rgba(197,160,89,0.35);
    border-radius: 18px;
    padding: 2.5rem 1rem;
    text-align: center;
    background: rgba(15,23,42,0.30);
    cursor: pointer;
    transition: border-color 0.25s, background 0.25s;
}
.nom-dropzone:hover,
.nom-dropzone.drag-over {
    border-color: #C5A059;
    background: rgba(197,160,89,0.05);
}
.nom-drop-icon  { color: #f59e0b; margin-bottom: 10px; }
.nom-drop-label { color: #64748b; font-size: 15px; margin: 0 0 4px; }
.nom-drop-sub   { color: #334155; font-size: 12px; margin: 0; }

/* ── CROP ─────────────────────────────────────────────────────────────── */
.nom-crop-stage { margin-top: 1.25rem; }
.nom-crop-wrap  {
    width: 320px;
    height: 400px;
    margin: 0 auto;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(197,160,89,0.25);
    background: #000;
    touch-action: none;
}
.nom-crop-canvas {
    display: block;
    width: 320px;
    height: 400px;
    cursor: grab;
}
.nom-crop-canvas:active { cursor: grabbing; }
.nom-crop-hint {
    text-align: center;
    font-size: 12px;
    color: #475569;
    margin-top: 10px;
}
.nom-crop-actions {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 14px;
}
.nom-crop-confirm {
    padding: 9px 24px;
    border-radius: 10px;
    background: #f59e0b;
    color: #000;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s;
}
.nom-crop-confirm:hover { opacity: 0.85; }
.nom-crop-cancel {
    padding: 9px 24px;
    border-radius: 10px;
    background: #ef4444;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    transition: opacity 0.2s;
}
.nom-crop-cancel:hover { opacity: 0.85; }

@media (max-width: 380px) {
    .nom-crop-wrap  { width: 100%; height: auto; aspect-ratio: 4/5; }
    .nom-crop-canvas { width: 100%; height: auto; }
}

/* ── UPLOAD PROGRESS ──────────────────────────────────────────────────── */
.nom-upload-box  { margin-top: 1.25rem; }
.nom-upload-track {
    height: 6px;
    background: rgba(255,255,255,0.07);
    border-radius: 999px;
    overflow: hidden;
}
.nom-upload-bar {
    height: 100%;
    background: linear-gradient(90deg, #ca8a04, #f59e0b);
    border-radius: 999px;
    width: 0%;
    transition: width 0.1s linear;
}
.nom-upload-pct { font-size: 12px; color: #475569; margin-top: 8px; }

/* ── FINAL PREVIEW ────────────────────────────────────────────────────── */
.nom-preview-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    max-width: 380px;
    margin: 1.25rem auto 0;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 16px;
    padding: 12px;
}
.nom-preview-thumb {
    width: 68px;
    height: 85px;
    object-fit: cover;
    border-radius: 10px;
    flex-shrink: 0;
}
.nom-preview-label { font-size: 13px; color: #64748b; flex: 1; }
.nom-preview-remove {
    background: #ef4444;
    color: #fff;
    border: none;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    flex-shrink: 0;
    transition: opacity 0.2s;
}
.nom-preview-remove:hover { opacity: 0.85; }

/* ── SUBMIT ───────────────────────────────────────────────────────────── */
.nom-submit {
    width: 100%;
    padding: 18px;
    border-radius: 999px;
    background: linear-gradient(90deg, #ca8a04, #f59e0b);
    color: #000;
    font-weight: 900;
    font-size: 12px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    margin-top: 0.5rem;
    transition: opacity 0.2s, transform 0.15s;
}
.nom-submit:hover:not(:disabled)  { opacity: 0.9; }
.nom-submit:active:not(:disabled) { transform: scale(0.99); }
.nom-submit:disabled { opacity: 0.35; cursor: not-allowed; }

</style>

{{-- CROPPER --}}
<script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.min.css">


<script>
document.addEventListener('DOMContentLoaded', () => {

// ════════════════════════════════════════════════════════════
// 1. ELEMENT REFS
// ════════════════════════════════════════════════════════════
const form        = document.getElementById('nominationForm');
const submitBtn   = document.getElementById('submit-btn');
const emailEl     = document.getElementById('nom-email');
const phoneEl     = document.getElementById('nom-phone');
const nameEl      = document.querySelector('input[name="name"]');
const reasonEl    = document.querySelector('textarea[name="reason"]');
const mainCat     = document.getElementById('main-category');
const subCat      = document.getElementById('sub-category');
const croppedImg  = document.getElementById('croppedImage');
const panel       = document.getElementById('accountPanel');
const actionEl    = document.getElementById('account_action');
const userIdEl    = document.getElementById('account_user_id');

// ════════════════════════════════════════════════════════════
// 2. ACCOUNT PANEL — show when email + phone filled
// ════════════════════════════════════════════════════════════
function maybeShowPanel() {
    if (emailEl.value.includes('@') && phoneEl.value.length > 5) {
        panel.classList.remove('hidden');
        document.getElementById('login-email').value = emailEl.value;
        document.getElementById('skip-email-display').textContent = emailEl.value;
    }
}
emailEl.addEventListener('blur', maybeShowPanel);
phoneEl.addEventListener('blur', maybeShowPanel);

// ── Tab switching ─────────────────────────────────────────
document.querySelectorAll('.account-tab[data-tab]').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.account-tab[data-tab]').forEach(b => b.classList.remove('active-tab'));
        btn.classList.add('active-tab');
        document.querySelectorAll('.acct-tab-panel').forEach(c => c.classList.add('hidden'));
        document.getElementById('tab-' + btn.dataset.tab).classList.remove('hidden');
        actionEl.value = btn.dataset.tab;
    });
});

// ── AJAX Login ────────────────────────────────────────────
document.getElementById('doLogin').addEventListener('click', async () => {
    const errEl = document.getElementById('login-error');
    errEl.textContent = '';

    const res  = await fetch('{{ route("account.ajax-login") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({
            email:    document.getElementById('login-email').value,
            password: document.getElementById('login-password').value,
        })
    });
    const data = await res.json();

    if (data.success) {
        setAuthed(data.user_id, data.name);
        actionEl.value = 'login';
    } else {
        errEl.textContent = data.message || 'Invalid credentials.';
    }
});

// ── AJAX Register ─────────────────────────────────────────
document.getElementById('doRegister').addEventListener('click', async () => {
    const errEl = document.getElementById('register-error');
    errEl.textContent = '';

    const pw  = document.getElementById('reg-password').value;
    const pw2 = document.getElementById('reg-confirm').value;

    if (pw.length < 8) { errEl.textContent = 'Password must be at least 8 characters.'; return; }
    if (pw !== pw2)    { errEl.textContent = 'Passwords do not match.'; return; }

    const res  = await fetch('{{ route("account.ajax-register") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({ email: emailEl.value, phone: phoneEl.value, password: pw })
    });
    const data = await res.json();

    if (data.success) {
        setAuthed(data.user_id, data.name);
        actionEl.value = 'register';
    } else {
        errEl.textContent = data.message || 'Could not create account.';
    }
});

// ── Logout / change ───────────────────────────────────────
document.getElementById('doLogout').addEventListener('click', () => {
    userIdEl.value = '';
    actionEl.value = 'skip';
    document.querySelectorAll('.acct-tab-panel').forEach(c => c.classList.add('hidden'));
    document.getElementById('tab-login').classList.remove('hidden');
    document.querySelectorAll('.account-tab[data-tab]').forEach(b => {
        b.classList.toggle('active-tab', b.dataset.tab === 'login');
    });
});

function setAuthed(id, name) {
    userIdEl.value = id;
    document.getElementById('authed-name').textContent = name;
    document.querySelectorAll('.acct-tab-panel').forEach(c => c.classList.add('hidden'));
    document.getElementById('tab-authed').classList.remove('hidden');
    document.querySelectorAll('.account-tab[data-tab]').forEach(b => b.classList.remove('active-tab'));
}

// ════════════════════════════════════════════════════════════
// 3. CATEGORY → SUBCATEGORY
// ════════════════════════════════════════════════════════════
const categoryData = @json($categories->load('subCategories')->keyBy('id'));

mainCat.addEventListener('change', function () {
    const subs = categoryData[this.value]?.sub_categories ?? [];
    subCat.innerHTML = '<option value="" disabled selected>Select Sub Category</option>';
    subs.forEach(sub => {
        const opt = document.createElement('option');
        opt.value = sub.id;
        opt.textContent = sub.name;
        subCat.appendChild(opt);
    });
    subCat.disabled = false;
    clearError(mainCat);
    clearError(subCat);
    checkCanSubmit();
});

subCat.addEventListener('change', () => {
    clearError(subCat);
    checkCanSubmit();
});

// ════════════════════════════════════════════════════════════
// 4. SOCIAL HANDLES — add / remove rows
// ════════════════════════════════════════════════════════════
const socialWrapper = document.getElementById('socialWrapper');
let socialIndex = 1;

document.getElementById('addSocial').addEventListener('click', () => {
    const row = document.createElement('div');
    row.className = 'social-row';
    row.innerHTML = `
        <select name="socials[${socialIndex}][platform]" class="luminous-input social-platform">
            <option>Facebook</option>
            <option>Instagram</option>
            <option>TikTok</option>
            <option>Twitter</option>
            <option>LinkedIn</option>
            <option>YouTube</option>
        </select>
        <input name="socials[${socialIndex}][handle]"
               class="luminous-input social-handle"
               placeholder="@username">
        <button type="button" class="remove-social">✕</button>
    `;
    socialWrapper.appendChild(row);
    socialIndex++;
});

socialWrapper.addEventListener('click', e => {
    if (e.target.classList.contains('remove-social')) {
        e.target.closest('.social-row').remove();
    }
});

// ════════════════════════════════════════════════════════════
// 5. IMAGE CROP & PREVIEW
// ════════════════════════════════════════════════════════════
const fileInput   = document.createElement('input');
fileInput.type    = 'file';
fileInput.accept  = 'image/*';

const dropzone     = document.getElementById('dropzone');
const cropStage    = document.getElementById('cropStage');
const canvas       = document.getElementById('cropCanvas');
const ctx          = canvas.getContext('2d');
const uploadBox    = document.getElementById('uploadBox');
const bar          = document.getElementById('bar');
const percent      = document.getElementById('percent');
const finalPreview = document.getElementById('finalPreview');

const CW = 320, CH = 400;
let img = null, posX = 0, posY = 0, scale = 1, minScale = 1;
let dragging = false, dragStartX, dragStartY, lastPinchDist = null;
let imageReady = false;

// Open picker
dropzone.addEventListener('click', () => fileInput.click());
dropzone.addEventListener('dragover', e => { e.preventDefault(); dropzone.style.borderColor = 'rgba(245,158,11,0.8)'; });
dropzone.addEventListener('dragleave', () => { dropzone.style.borderColor = ''; });
dropzone.addEventListener('drop', e => {
    e.preventDefault();
    dropzone.style.borderColor = '';
    const file = e.dataTransfer.files[0];
    if (file?.type.startsWith('image/')) loadFile(file);
});
fileInput.addEventListener('change', e => { if (e.target.files[0]) loadFile(e.target.files[0]); });

function loadFile(file) {
    const reader = new FileReader();
    reader.onload = ev => {
        img = new Image();
        img.onload = () => {
            const scaleW = CW / img.naturalWidth;
            const scaleH = CH / img.naturalHeight;
            minScale = Math.max(scaleW, scaleH);
            scale = minScale; posX = 0; posY = 0;
            dropzone.classList.add('hidden');
            cropStage.classList.remove('hidden');
            requestAnimationFrame(draw);
        };
        img.src = ev.target.result;
    };
    reader.readAsDataURL(file);
}

function draw() {
    if (!img) return;
    ctx.clearRect(0, 0, CW, CH);
    const w = img.naturalWidth * scale;
    const h = img.naturalHeight * scale;
    ctx.drawImage(img, (CW - w) / 2 + posX, (CH - h) / 2 + posY, w, h);
}

function clamp() {
    const w = img.naturalWidth * scale, h = img.naturalHeight * scale;
    posX = Math.min((w - CW) / 2, Math.max(-(w - CW) / 2, posX));
    posY = Math.min((h - CH) / 2, Math.max(-(h - CH) / 2, posY));
}

// Mouse drag
canvas.addEventListener('mousedown', e => {
    dragging = true;
    dragStartX = e.clientX - posX;
    dragStartY = e.clientY - posY;
    canvas.style.cursor = 'grabbing';
});
window.addEventListener('mousemove', e => {
    if (!dragging) return;
    posX = e.clientX - dragStartX;
    posY = e.clientY - dragStartY;
    clamp(); draw();
});
window.addEventListener('mouseup', () => { dragging = false; canvas.style.cursor = 'grab'; });

// Scroll zoom
canvas.addEventListener('wheel', e => {
    e.preventDefault();
    zoomAround(CW / 2, CH / 2, e.deltaY * -0.001);
}, { passive: false });

// Touch
canvas.addEventListener('touchstart', e => {
    e.preventDefault();
    if (e.touches.length === 1) {
        dragging = true;
        dragStartX = e.touches[0].clientX - posX;
        dragStartY = e.touches[0].clientY - posY;
        lastPinchDist = null;
    } else if (e.touches.length === 2) {
        dragging = false;
        lastPinchDist = pinchDist(e.touches);
    }
}, { passive: false });

canvas.addEventListener('touchmove', e => {
    e.preventDefault();
    if (e.touches.length === 1 && dragging) {
        posX = e.touches[0].clientX - dragStartX;
        posY = e.touches[0].clientY - dragStartY;
        clamp(); draw();
    } else if (e.touches.length === 2) {
        const dist = pinchDist(e.touches);
        if (lastPinchDist) {
            const mid = pinchMid(e.touches, canvas);
            zoomAround(mid.x, mid.y, (dist - lastPinchDist) / lastPinchDist * 0.6);
        }
        lastPinchDist = dist;
    }
}, { passive: false });

canvas.addEventListener('touchend', e => {
    if (e.touches.length < 2) lastPinchDist = null;
    if (e.touches.length === 0) dragging = false;
}, { passive: false });

function pinchDist(t) {
    return Math.sqrt((t[0].clientX - t[1].clientX) ** 2 + (t[0].clientY - t[1].clientY) ** 2);
}
function pinchMid(t, el) {
    const r = el.getBoundingClientRect();
    return { x: (t[0].clientX + t[1].clientX) / 2 - r.left, y: (t[0].clientY + t[1].clientY) / 2 - r.top };
}
function zoomAround(cx, cy, delta) {
    const newScale = Math.min(4, Math.max(minScale, scale + delta));
    const ratio = newScale / scale;
    posX = cx + (posX - cx) * ratio;
    posY = cy + (posY - cy) * ratio;
    scale = newScale; clamp(); draw();
}

// Confirm crop
document.getElementById('confirmCrop').addEventListener('click', () => {
    const out = document.createElement('canvas');
    out.width = 640; out.height = 800;
    const octx = out.getContext('2d');
    const w = img.naturalWidth * scale, h = img.naturalHeight * scale;
    const x = (CW - w) / 2 + posX, y = (CH - h) / 2 + posY;
    octx.drawImage(img, x * 2, y * 2, w * 2, h * 2);
    const base64 = out.toDataURL('image/jpeg', 0.92);
    croppedImg.value = base64;
    cropStage.classList.add('hidden');
    startFakeUpload(base64);
});

document.getElementById('cancelCrop').addEventListener('click', resetImage);

function startFakeUpload(base64) {
    uploadBox.classList.remove('hidden');
    let p = 0;
    const iv = setInterval(() => {
        p = Math.min(p + 3, 100);
        bar.style.width = p + '%';
        percent.textContent = 'Uploading ' + p + '%';
        if (p === 100) {
            clearInterval(iv);
            percent.textContent = 'Upload complete ✓';
            setTimeout(() => showPreview(base64), 300);
        }
    }, 16);
}

function showPreview(base64) {
    uploadBox.classList.add('hidden');
    finalPreview.innerHTML = `
        <div style="display:flex;align-items:center;justify-content:space-between;gap:16px;
                    max-width:360px;margin:0 auto;background:rgba(255,255,255,0.05);
                    padding:12px;border-radius:16px;border:1px solid rgba(255,255,255,0.08);">
            <img src="${base64}" style="width:72px;height:90px;object-fit:cover;border-radius:10px;flex-shrink:0;">
            <span style="font-size:13px;color:#94a3b8;flex:1;">Portrait ready ✓</span>
            <button id="removeImg" type="button"
                style="background:#ef4444;color:#fff;border:none;padding:8px 14px;
                       border-radius:8px;font-size:12px;cursor:pointer;flex-shrink:0;">
                Remove
            </button>
        </div>`;
    finalPreview.classList.remove('hidden');
    document.getElementById('removeImg').onclick = resetImage;

    // Mark image as ready
    imageReady = true;
    clearError(dropzone);
    checkCanSubmit();
}

function resetImage() {
    img = null; fileInput.value = '';
    scale = posX = posY = 0;
    ctx.clearRect(0, 0, CW, CH);
    cropStage.classList.add('hidden');
    uploadBox.classList.add('hidden');
    finalPreview.classList.add('hidden');
    dropzone.classList.remove('hidden');
    croppedImg.value = '';
    imageReady = false;
    checkCanSubmit();
}

// ════════════════════════════════════════════════════════════
// 6. SUBMIT GATE — enable button only when all fields filled
// ════════════════════════════════════════════════════════════
function checkCanSubmit() {
    const allFilled =
        emailEl.value.includes('@')   &&
        phoneEl.value.trim().length > 5 &&
        nameEl.value.trim()           &&
        reasonEl.value.trim()         &&
        mainCat.value                 &&
        subCat.value                  &&
        imageReady;

    submitBtn.disabled = !allFilled;
}

// Watch all text fields live
[emailEl, phoneEl, nameEl, reasonEl].forEach(el => {
    el.addEventListener('input', () => { clearError(el); checkCanSubmit(); });
});

// ════════════════════════════════════════════════════════════
// 7. VALIDATION — highlight empty fields + error banner
// ════════════════════════════════════════════════════════════
const requiredFields = [
    { el: emailEl,  label: 'Email' },
    { el: phoneEl,  label: 'Phone' },
    { el: nameEl,   label: 'Star Name' },
    { el: reasonEl, label: 'Why They Deserve It' },
    { el: mainCat,  label: 'Category' },
    { el: subCat,   label: 'Sub Category' },
];

function setError(el) {
    if (!el) return;
    el.style.borderColor = '#ef4444';
    el.style.boxShadow   = '0 0 0 3px rgba(239,68,68,0.18)';
}
function clearError(el) {
    if (!el) return;
    el.style.borderColor = '';
    el.style.boxShadow   = '';
}

function showBanner(errors) {
    let banner = document.getElementById('val-banner');
    if (!banner) {
        banner = document.createElement('div');
        banner.id = 'val-banner';
        banner.style.cssText = `
            background: rgba(239,68,68,0.10);
            border: 1px solid rgba(239,68,68,0.35);
            border-radius: 14px;
            padding: 14px 18px;
            margin-bottom: 1.25rem;
            font-size: 13px;
            font-weight: 600;
            color: #f87171;
            line-height: 1.8;
        `;
        submitBtn.parentNode.insertBefore(banner, submitBtn);
    }
    banner.innerHTML = `<strong style="display:block;margin-bottom:4px;">
        Please complete the following fields:
    </strong>${errors.map(e => `• ${e}`).join('<br>')}`;
    banner.style.display = 'block';
    banner.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function hideBanner() {
    const b = document.getElementById('val-banner');
    if (b) b.style.display = 'none';
}

// Clear errors on input
requiredFields.forEach(({ el }) => {
    el?.addEventListener('input', () => { clearError(el); hideBanner(); });
    el?.addEventListener('change', () => { clearError(el); hideBanner(); });
});

// ════════════════════════════════════════════════════════════
// 8. FORM SUBMIT
// ════════════════════════════════════════════════════════════
form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Clear previous errors
    requiredFields.forEach(({ el }) => clearError(el));
    hideBanner();

    // Collect errors
    const errors = [];

    requiredFields.forEach(({ el, label }) => {
        if (!el || !el.value.trim()) {
            setError(el);
            errors.push(label);
        }
    });

    if (!imageReady) {
        setError(dropzone);
        errors.push('Portrait Image (please select and confirm)');
    }

    if (errors.length > 0) {
        showBanner(errors);
        return; // block submit
    }

    // ── All valid — submit ────────────────────────────────
    submitBtn.disabled    = true;
    submitBtn.textContent = 'Submitting…';
    submitBtn.style.opacity = '0.7';
    this.submit();
});

}); // end DOMContentLoaded
</script>

<script>
    // Category logic
    const categoryData = @json($categories->keyBy('id'));
    const mainSelect = document.getElementById('main-category');
    const subSelect = document.getElementById('sub-category');

    mainSelect.addEventListener('change', function() {
        const subs = categoryData[this.value]?.subcategories || [];
        subSelect.innerHTML = '<option value="" disabled selected>Choose Sub-Category</option>';
        subs.forEach(sub => {
            const opt = document.createElement('option');
            opt.value = sub.id;
            opt.textContent = sub.name;
            subSelect.appendChild(opt);
        });
        subSelect.disabled = false;
        subSelect.classList.remove('opacity-50');
    });

    // File Upload Logic
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('image');
    const previewContainer = document.getElementById('file-preview');
    const uploadBtn = document.getElementById('upload-btn');
    const submitBtn = document.getElementById('submit-btn');
    let selectedFile = null;

    dropzone.addEventListener('click', () => fileInput.click());

    // Drag & Drop
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('border-amber-500', 'bg-amber-50');
    });
    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('border-amber-500', 'bg-amber-50'));
    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('border-amber-500', 'bg-amber-50');
        if (e.dataTransfer.files[0]) handleFileSelection(e.dataTransfer.files[0]);
    });

    fileInput.addEventListener('change', (e) => {
        if (e.target.files[0]) handleFileSelection(e.target.files[0]);
    });

    function handleFileSelection(file) {
        if (!['image/jpeg','image/png','image/gif','application/pdf'].includes(file.type)) {
            alert('Only JPG, PNG, GIF and PDF files are allowed.');
            return;
        }
        if (file.size > 2 * 1024 * 1024) {
            alert('File must be smaller than 2MB.');
            return;
        }

        selectedFile = file;

        previewContainer.innerHTML = `
            <div class="bg-white border border-gray-200 rounded-3xl p-5 flex items-center gap-4">
                <div class="text-amber-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2" />
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-slate-800 truncate">${file.name}</p>
                    <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB • Ready to upload</p>
                    <div class="mt-3 h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div id="progress-bar" class="h-full bg-gradient-to-r from-amber-500 to-yellow-600 w-0 transition-all duration-300"></div>
                    </div>
                </div>
                <!-- Red X Icon -->
                <button id="remove-btn" class="text-red-500 hover:text-red-600 text-2xl leading-none w-8 h-8 flex items-center justify-center hover:bg-red-50 rounded-xl transition-colors">
                    ✕
                </button>
            </div>
        `;

        previewContainer.classList.remove('hidden');
        uploadBtn.classList.remove('hidden');
        uploadBtn.textContent = 'Upload Selected File';
        uploadBtn.style.backgroundColor = '#0f172a';
        dropzone.classList.add('hidden');
        submitBtn.disabled = true;
    }

    // Handle remove button click
    previewContainer.addEventListener('click', function(e) {
        if (e.target.id === 'remove-btn' || e.target.closest('#remove-btn')) {
            resetUpload();
        }
    });

    function resetUpload() {
        selectedFile = null;
        previewContainer.innerHTML = '';
        previewContainer.classList.add('hidden');
        uploadBtn.classList.add('hidden');
        dropzone.classList.remove('hidden');
        fileInput.value = '';
        submitBtn.disabled = true;
    }

    // Upload button - fills progress bar and changes to "File Ready"
    uploadBtn.addEventListener('click', () => {
        if (!selectedFile) return;

        const progressBar = document.getElementById('progress-bar');
        let progress = 0;

        const interval = setInterval(() => {
            progress += 15;
            if (progress > 100) progress = 100;
            progressBar.style.width = `${progress}%`;

            if (progress >= 100) {
                clearInterval(interval);
                uploadBtn.innerHTML = '✓ File Ready for Submission';
                uploadBtn.style.backgroundColor = '#d97706'; // amber-600
                submitBtn.disabled = false;
            }
        }, 70);
    });

    // Form validation
    document.getElementById('nominationForm').addEventListener('submit', function(e) {
        if (!selectedFile) {
            e.preventDefault();
            alert('Please upload a Star Portrait before submitting.');
        }
    });
    
</script>

<style>
    .luminous-label { 
        display: block; 
        font-size: 9px; 
        font-weight: 900; 
        text-transform: uppercase; 
        letter-spacing: 0.3em; 
        color: #94a3b8; 
        margin-bottom: 0.5rem; 
    }
    .luminous-input { 
        width: 100%; 
        background: #FDFCF7; 
        border: 1px solid rgba(0,0,0,0.05); 
        border-radius: 1.5rem; 
        padding: 1.25rem 1.5rem; 
        font-weight: 700; 
        outline: none; 
        transition: 0.3s; 
        font-size: 0.85rem; 
    }
    .luminous-input:focus { 
        border-color: #C5A059; 
        background: white; 
    }
</style>

@endsection