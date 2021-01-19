const plugin = require('tailwindcss/plugin')

module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true,
    },
    purge: {
        content: [
            "./resources/views/**/*.blade.php"
        ],
        options: {
            whitelistPatterns: [
                /^text\-[a-z0-9]{2,3}$/,
                /^text\-[a-z0-9]+$/,
                /^bg\-[a-z0-9]+$/,
            ],
        }
    },
    theme: {
        container: false,
        extend: {
            borderWidth: {
                3: '3px'
            },
            colors: {
                transparent: 'transparent',
                currentColor: 'currentColor',
                primary: {
                    default: '#854322',
                },
                secondary: {
                    default: '#F7AA30',
                },
                tertiary: {
                    default: '#F8CB82',
                },
                light: {
                    default: '#ffffff',
                    1: '#fcfdff',
                    2: '#f6faff',
                    3: '#f1f7ff',
                    4: '#edf4ff',
                    5: '#e2eaf7',
                    6: '#d8e0ee',
                    7: '#d3dcec',
                    8: '#d1daec',
                    9: '#c6d0e5',
                    10: '#bac5dd',
                    11: '#acb8d0'
                },
                dark: {
                    default: '#000',
                    1: '#181918',
                    2: '#262826',
                    3: '#343633',
                    4: '#464845'
                },
                // red: {
                //     default: '#ff2f3e',
                // },
                // green: {
                //     default: '#00b894'
                // },
                // blue: {
                //     default: '#2381d4'
                // },
                // yellow: {
                //     default: '#ffcd25'
                // },
            },
            opacity: {
                '2': '0.02',
                '4': '0.04',
                '5': '0.05',
                '6': '0.06',
                '8': '0.08',
                '10': '0.1',
                '20': '0.2',
                '30': '0.3',
                '40': '0.4',
                '60': '0.6',
                '70': '0.7',
                '80': '0.8',
                '90': '0.9',
            },
            boxShadow: {
                default: '0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)',
                md: ' 0 4px 6px -1px rgba(0, 0, 0, .1), 0 2px 4px -1px rgba(0, 0, 0, .06)',
                lg: ' 0 2px 16px -3px rgba(0, 0, 0, .065)',
                xl: ' 0 2px 20px -5px rgba(0, 0, 0, .085)',
                "2xl": '0 25px 50px -12px rgba(0, 0, 0, .25)',
                "3xl": '0 35px 60px -15px rgba(0, 0, 0, .3)',
            },
            borderRadius: {
                none: '0',
                px: '1px',
                '2px': '2px',
                '3px': '3px',
                xs: '0.3rem',
                sm: '0.5rem',
                default: '0.75rem',
                md: '1rem',
                lg: '2rem',
                full: '9999px',
            },
            fontFamily: {
                iranyekan: ['iranyekan', 'serif'],
                roboto: ['Roboto Slab', 'serif'],
            },
            spacing: {
                '2px': '2px',
                '3px': '3px',
                '1/2': '0.125rem',
                '1/4': '0.0675rem',
                '3/4': '0.2025rem',

                '25pc': '25%',
                '50pc': '50%',
                '75pc': '75%',

                '7': '1.75rem',
                '16': '4rem',
                '20': '5rem',
                '24': '6rem',
                '28': '7rem',
                '32': '8rem',
                '36': '9rem',
                '40': '10rem',
                '44': '11rem',
                '48': '12rem',
                '52': '13rem',
                '56': '14rem',
                '60': '15rem',
                '64': '16rem',
                '68': '17rem',
                '72': '18rem',
                '76': '19rem',
                '80': '20rem',
                '84': '21rem',
                '88': '22rem',
                '92': '23rem',
                '96': '24rem',
                '100': '25rem',
                '104': '26rem',
                '108': '27rem',
                '112': '28rem',
                '116': '29rem',
                '120': '30rem',
                '124': '31rem',
                '128': '32rem',
                '132': '33rem',
                '136': '34rem',
                '140': '35rem',
                '144': '36rem',
                '148': '37rem',
                '152': '38rem',
                '156': '39rem',
                '160': '40rem',
            },
            inset: (theme, {negative}) => ({
                '1/2': '50%',
                ...theme('spacing'),
                ...negative(theme('spacing')),
            }),
            width: {
                '1/24': '4.166%',
                '2/24': '8.333%',
                '3/24': '12.5%',
                '4/24': '16.666%',
                '5/24': '20.833%',
                '6/24': '25%',
                '7/24': '29.166%',
                '8/24': '33.333%',
                '9/24': '37.5%',
                '10/24': '41.666%',
                '11/24': '45.833%',
                '12/24': '50%',
                '13/24': '54.166%',
                '14/24': '58.333%',
                '15/24': '62.5%',
                '16/24': '66.666%',
                '17/24': '70.833%',
                '18/24': '75%',
                '19/24': '79.166%',
                '20/24': '83.333%',
                '21/24': '87.5%',
                '22/24': '91.666%',
                '23/24': '95.833%',
            },
            minWidth: theme => ({
                ...theme('width')
            }),
            minHeight: theme => ({
                ...theme('height')
            }),
            maxWidth: theme => ({
                ...theme('width'),
            }),
            maxHeight: theme => ({
                ...theme('width'),
            })
        },
    },
    variants: {
        padding: ['last', 'first', 'responsive'],
        margin: ['last', 'first', 'responsive'],
        borderWidth: ['responsive', 'last', 'even', 'odd', 'cursor'],
        textColor: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        textOpacity: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        backgroundOpacity: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        borderOpacity: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        backgroundColor: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        borderColor: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        boxShadow: ['responsive', 'hover', 'focus', 'focus-within', 'cursor'],
        opacity: ['responsive', 'hover', 'focus', 'focus-within', 'cursor', 'disabled'],
        borderRadius: ['responsive', 'last', 'first'],
        scale: ['responsive', 'hover', 'focus', 'active', 'group-hover', 'cursor'],
        cursor: ['responsive', 'disabled'],
        translate: ['responsive', 'hover', 'focus', 'cursor'],
        display: ['responsive', 'hover', 'focus', 'cursor', 'last', 'first'],
        gridColumn: ['responsive', 'last', 'first', 'last-and-even', 'last-and-odd'],
        gridColumnStart: ['responsive', 'last', 'first', 'last-and-even', 'last-and-odd'],
        gridColumnEnd: ['responsive', 'last', 'first', 'last-and-even', 'last-and-odd'],
    },
    plugins: [
        require('@tailwindcss/custom-forms'),

        plugin(function ({addVariant, e}) {
            addVariant('cursor', ({modifySelectors, separator}) => {
                modifySelectors(({className}) => {
                    return `.${e(`cursor${separator}${className}`)}:focus, .${e(`cursor${separator}${className}`)}:hover, .${e(`cursor${separator}${className}`)}:focus-within`
                })
            })
        }),

        plugin(function ({addVariant, e}) {
            addVariant('last-and-even', ({modifySelectors, separator}) => {
                modifySelectors(({className}) => {
                    return `.${e(`last-and-even${separator}${className}`)}:nth-child(even):last-child`
                })
            })
        }),
        plugin(function ({addVariant, e}) {
            addVariant('last-and-odd', ({modifySelectors, separator}) => {
                modifySelectors(({className}) => {
                    return `.${e(`last-and-odd${separator}${className}`)}:nth-child(odd):last-child`
                })
            })
        }),
    ],
}
