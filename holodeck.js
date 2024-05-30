import defaultTheme from "tailwindcss/defaultTheme";
import plugin from "tailwindcss/plugin";

export const tailwind = plugin(({addBase, addComponents}) => {
    const fontStyles = [
        ['Thin', 100],
        ['ExtraLight', 200],
        ['Light', 300],
        ['Regular', 400],
        ['Medium', 500],
        ['SemiBold', 600],
        ['Bold', 700],
        ['ExtraBold', 800],
        ['Black', 900],
    ];

    const fonts = [
        ...fontStyles.map((data) => ({
            fontFamily: 'hk-grotesk',
            src: `url("@fonts/Hanken_Grotesk/HankenGrotesk-${data[0]}.ttf")`,
            fontWeight: data[1],
            fontStyle: 'normal',
        })),
        ...fontStyles.map((data) => ({
            fontFamily: 'hk-grotesk',
            src: `url("@fonts/Hanken_Grotesk/HankenGrotesk-${data[0]}Italic.ttf")`,
            fontWeight: data[1],
            fontStyle: 'italic',
        })),
        ...fontStyles.map((data) => ({
            fontFamily: 'kanit',
            src: `url("@fonts/Kanit/Kanit-${data[0]}.ttf")`,
            fontWeight: data[1],
            fontStyle: 'normal',
        })),
        ...fontStyles.map((data) => ({
            fontFamily: 'kanit',
            src: `url("@fonts/Kanit/Kanit-${data[0]}Italic.ttf")`,
            fontWeight: data[1],
            fontStyle: 'italic',
        }))
    ];

    addBase({
        'body': {
            fontFamily: 'hk-grotesk',
            backgroundColor: '#060606',
            color: '#FFFFFF',
            minHeight: '100vh',
        },
        '@font-face': fonts,
        'input[type="checkbox"]:checked': {
            backgroundImage: `url('data:image/svg+xml,<svg width="12" height="12" version="1.1" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="8" height="8" fill="%231544EF"/></svg>')`,
        },
        'input[type="radio"]:checked': {
            backgroundImage: `url('data:image/svg+xml,<svg width="12" height="12" version="1.1" xmlns="http://www.w3.org/2000/svg"><circle cx="6" cy="6" r="3.5" fill="%231544EF"/></svg>')`,
        },
    });
}, {
    theme: {
        fontSize: {
            DEFAULT: "15px",
            "2xs": "10px",
            xs: "12px",
            sm: "13px",
            md: "15px",
            lg: "16px",
            xl: "18px",
            "2xl": "20px",
            "3xl": "24px",
            "4xl": "28px",
        },
        extend: {
            fontFamily: {
                sans: ["hk-grotesk", ...defaultTheme.fontFamily.sans],
                title: ["kanit", ...defaultTheme.fontFamily.sans],
            },
            textColor: {
                DEFAULT: "#FFFFFF",
            },
            colors: {
                gray: {
                    900: "#060606",
                    800: "#121212",
                    700: "#1A1A1A",
                    600: "#1D1D1D",
                    500: "#3B3B3B",
                    400: "#414141",
                    200: "#B4B4B4",
                },
                primary: {
                    lowlight: "#0C1F63",
                    DEFAULT: "#1544EF",
                    highlight: "#0075FF",
                },
                alternate: {
                    DEFAULT: "#FFFFFF",
                },
                secondary: {
                    DEFAULT: "#A6B9FF",
                },
                error: {
                    DEFAULT: "#D95454",
                },
            },
            ringColor: ({ theme }) => ({
                DEFAULT: theme("colors.alternate.DEFAULT"),
            }),
        },
    }
});

export const vite = () => ({
    name: 'holodeck',
    config: () => ({
        resolve: {
            alias: [
                { find: '@assets', replacement: '/resources/assets' },
                { find: '@fonts', replacement: '/resources/fonts' }
            ]
        },
    }),
});
