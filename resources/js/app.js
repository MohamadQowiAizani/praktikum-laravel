import './bootstrap';

const THEME_KEY = 'sisurat-theme';
const root = document.documentElement;

function applyTheme(theme) {
    const selected = theme === 'dark' ? 'dark' : 'light';
    root.dataset.theme = selected;
    localStorage.setItem(THEME_KEY, selected);

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        const nextTheme = selected === 'dark' ? 'light' : 'dark';
        button.setAttribute('aria-label', `Aktifkan tema ${nextTheme === 'dark' ? 'gelap' : 'terang'}`);
        button.setAttribute('aria-pressed', String(selected === 'dark'));
        const label = button.querySelector('.theme-toggle-label');
        if (label) label.textContent = selected === 'dark' ? 'Gelap' : 'Terang';
    });

    const themeColor = document.querySelector('meta[name="theme-color"]');
    if (themeColor) themeColor.setAttribute('content', selected === 'dark' ? '#10070c' : '#eaf4ff');
}

// Sync state on every page (including login) and persist the user's choice.
applyTheme(localStorage.getItem(THEME_KEY) || 'light');

document.addEventListener('click', (event) => {
    const toggle = event.target.closest('[data-theme-toggle]');
    if (!toggle) return;
    applyTheme(root.dataset.theme === 'dark' ? 'light' : 'dark');
});
