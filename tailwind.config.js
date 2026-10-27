/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                ink: '#172033',
                slate: {
                    DEFAULT: '#5B6472',
                    light: '#8A93A3',
                },
                mist: '#F5F7FA',
                abyss: {
                    DEFAULT: '#1F3B4D',
                    dark: '#122430',
                    light: '#2C5670',
                },
                moon: {
                    DEFAULT: '#E9A857',
                    soft: '#FCEEDA',
                    dark: '#C7863A',
                },
                line: '#E3E7ED',
                success: '#2F9E6B',
                danger: '#D6564B',
            },
            fontFamily: {
                display: ['"Fraunces"', 'serif'],
                sans: ['"Manrope"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
                soft: '0 1px 2px rgba(23,32,51,0.04), 0 8px 24px -4px rgba(23,32,51,0.08)',
            },
            borderRadius: {
                '2xl': '1rem',
                '3xl': '1.5rem',
            },
        },
    },
    plugins: [],
};
