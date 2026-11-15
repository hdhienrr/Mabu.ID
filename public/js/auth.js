/**
 * MABU - Authentication Scripts (Login & Register)
 * Dipisahkan dari Blade template untuk Clean Code & Separation of Concerns.
 */

document.addEventListener('DOMContentLoaded', function () {
    initPasswordToggles();
    initLoginRoleSwitcher();
    initRegisterRoleSwitcher();
    initPasswordStrengthMeter();
    initPasswordMatchChecker();
    initRegisterFormSubmit();
    initSocialAuth();
});

/* ----------------------------------------------------
 * 1. Password Visibility Toggle (Show / Hide Password)
 * ---------------------------------------------------- */
function initPasswordToggles() {
    // Universal data-attribute toggle support
    const dataToggleButtons = document.querySelectorAll('[data-toggle="password"]');
    dataToggleButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const iconId = this.getAttribute('data-icon');
            const targetInput = document.getElementById(targetId);
            const iconElement = document.getElementById(iconId);

            if (!targetInput) return;

            const isPassword = targetInput.type === 'password';
            targetInput.type = isPassword ? 'text' : 'password';

            if (iconElement) {
                iconElement.textContent = isPassword ? 'visibility_off' : 'visibility';
            }
        });
    });

    // Login page: #toggle-password -> #password & #password-icon
    const loginToggleBtn = document.getElementById('toggle-password');
    if (loginToggleBtn && !loginToggleBtn.hasAttribute('data-toggle')) {
        loginToggleBtn.addEventListener('click', function () {
            const pwdInput = document.getElementById('password');
            const pwdIcon = document.getElementById('password-icon');
            if (!pwdInput) return;

            const isPassword = pwdInput.type === 'password';
            pwdInput.type = isPassword ? 'text' : 'password';
            if (pwdIcon) {
                pwdIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
            }
        });
    }

    // Register page: #toggle-reg-password & #toggle-confirm-password
    const regPwdToggle = document.getElementById('toggle-reg-password');
    if (regPwdToggle && !regPwdToggle.hasAttribute('data-toggle')) {
        regPwdToggle.addEventListener('click', function () {
            const pwdInput = document.getElementById('password');
            const pwdIcon = document.getElementById('password-toggle-icon');
            if (!pwdInput) return;

            const isPassword = pwdInput.type === 'password';
            pwdInput.type = isPassword ? 'text' : 'password';
            if (pwdIcon) {
                pwdIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
            }
        });
    }

    const regConfirmToggle = document.getElementById('toggle-confirm-password');
    if (regConfirmToggle && !regConfirmToggle.hasAttribute('data-toggle')) {
        regConfirmToggle.addEventListener('click', function () {
            const confirmInput = document.getElementById('password_confirmation');
            const confirmIcon = document.getElementById('confirm-toggle-icon');
            if (!confirmInput) return;

            const isPassword = confirmInput.type === 'password';
            confirmInput.type = isPassword ? 'text' : 'password';
            if (confirmIcon) {
                confirmIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
            }
        });
    }
}

/* ----------------------------------------------------
 * 2. Login Role Switcher (Mahasiswa / Mitra Usaha)
 * ---------------------------------------------------- */
function initLoginRoleSwitcher() {
    const roleStudent = document.getElementById('role-student');
    const rolePartner = document.getElementById('role-partner');
    const loginRoleInput = document.getElementById('login-role');

    if (!roleStudent || !rolePartner) return;

    function setActiveLoginRole(activeBtn, inactiveBtn, roleValue) {
        activeBtn.classList.add('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'border-border-light');
        activeBtn.classList.remove('text-on-surface-variant', 'border-transparent');
        inactiveBtn.classList.remove('bg-surface-container-lowest', 'text-primary', 'shadow-sm', 'border-border-light');
        inactiveBtn.classList.add('text-on-surface-variant', 'border-transparent');
        if (loginRoleInput) {
            loginRoleInput.value = roleValue;
        }
    }

    roleStudent.addEventListener('click', function () {
        setActiveLoginRole(roleStudent, rolePartner, 'student');
    });

    rolePartner.addEventListener('click', function () {
        setActiveLoginRole(rolePartner, roleStudent, 'partner');
    });
}

/* ----------------------------------------------------
 * 3. Register Role Switcher (Pencari Kerja / Pemilik Usaha)
 * ---------------------------------------------------- */
function initRegisterRoleSwitcher() {
    const jobseekerBtn = document.getElementById('role-jobseeker-btn');
    const employerBtn = document.getElementById('role-employer-btn');
    const selectedRoleInput = document.getElementById('selected-role');

    if (!jobseekerBtn || !employerBtn || !selectedRoleInput) return;

    const activeClasses = 'flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 bg-surface-container-lowest shadow-sm text-primary group border border-border-light';
    const inactiveClasses = 'flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 text-on-surface-variant hover:text-on-surface group border border-transparent';

    function setRegisterRole(role) {
        selectedRoleInput.value = role;

        if (role === 'jobseeker') {
            jobseekerBtn.className = activeClasses;
            employerBtn.className = inactiveClasses;
        } else {
            employerBtn.className = activeClasses;
            jobseekerBtn.className = inactiveClasses;
        }
    }

    jobseekerBtn.addEventListener('click', function () {
        setRegisterRole('jobseeker');
    });

    employerBtn.addEventListener('click', function () {
        setRegisterRole('employer');
    });
}

/* ----------------------------------------------------
 * 4. Password Strength Meter (Register)
 * ---------------------------------------------------- */
function initPasswordStrengthMeter() {
    const passwordInput = document.getElementById('password');
    const b1 = document.getElementById('bar-1');
    const b2 = document.getElementById('bar-2');
    const b3 = document.getElementById('bar-3');
    const b4 = document.getElementById('bar-4');
    const label = document.getElementById('strength-label');

    if (!passwordInput || !b1 || !label) return;

    const bars = [b1, b2, b3, b4];

    passwordInput.addEventListener('input', function () {
        const val = this.value;

        bars.forEach(function (b) {
            if (b) b.className = 'h-full bg-border-light transition-colors';
        });

        if (!val) {
            label.textContent = 'Kekuatan sandi';
            label.className = 'font-body-xs text-body-xs text-text-faint-light';
            return;
        }

        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;

        if (score === 1) {
            if (b1) b1.className = 'h-full bg-error transition-colors';
            label.textContent = 'Lemah';
            label.className = 'font-body-xs text-body-xs text-error font-medium';
        } else if (score === 2) {
            if (b1) b1.className = 'h-full bg-warning transition-colors';
            if (b2) b2.className = 'h-full bg-warning transition-colors';
            label.textContent = 'Cukup';
            label.className = 'font-body-xs text-body-xs text-warning font-medium';
        } else if (score === 3) {
            if (b1) b1.className = 'h-full bg-info transition-colors';
            if (b2) b2.className = 'h-full bg-info transition-colors';
            if (b3) b3.className = 'h-full bg-info transition-colors';
            label.textContent = 'Baik';
            label.className = 'font-body-xs text-body-xs text-info font-medium';
        } else if (score >= 4) {
            bars.forEach(function (b) {
                if (b) b.className = 'h-full bg-success transition-colors';
            });
            label.textContent = 'Sangat Kuat';
            label.className = 'font-body-xs text-body-xs text-success font-medium';
        }
    });
}

/* ----------------------------------------------------
 * 5. Password Confirmation Match Checker (Register)
 * ---------------------------------------------------- */
function initPasswordMatchChecker() {
    const pwd = document.getElementById('password');
    const confirm = document.getElementById('password_confirmation');
    const errorEl = document.getElementById('match-error');

    if (!pwd || !confirm || !errorEl) return;

    function checkMatch() {
        if (confirm.value && pwd.value !== confirm.value) {
            errorEl.classList.remove('hidden');
        } else {
            errorEl.classList.add('hidden');
        }
    }

    confirm.addEventListener('input', checkMatch);
    pwd.addEventListener('input', checkMatch);
}

/* ----------------------------------------------------
 * 6. Register Form Submit Validation & Loading State
 * ---------------------------------------------------- */
function initRegisterFormSubmit() {
    const form = document.getElementById('register-form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        const pwd = document.getElementById('password');
        const confirm = document.getElementById('password_confirmation');
        const errorEl = document.getElementById('match-error');

        if (pwd && confirm && pwd.value !== confirm.value) {
            e.preventDefault();
            if (errorEl) errorEl.classList.remove('hidden');
            return false;
        }

        const btn = document.getElementById('submit-btn');
        if (btn) {
            setTimeout(function () {
                btn.disabled = true;
                btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[20px]">progress_activity</span><span>Memproses...</span>';
            }, 10);
        }
    });
}

/* ----------------------------------------------------
 * 7. Social Auth (Google)
 * ---------------------------------------------------- */
function initSocialAuth() {
    const googleBtns = document.querySelectorAll('[data-action="google-auth"]');
    googleBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            alert('Membuka autentikasi Google untuk akun MABU...');
        });
    });
}
