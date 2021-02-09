export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,
  mode: 'spa',
  server: {
    port: 3000, // default: 3000
    host: '0.0.0.0' // default: localhost
  },

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Top movies',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
    ]
  },

  css: [
    '@/assets/scss/main.scss'
  ],

  plugins: [
  ],

  components: true,

  buildModules: [
    // https://go.nuxtjs.dev/typescript
    '@nuxt/typescript-build'
  ],

  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/pwa',
    '@nuxtjs/style-resources',
    '@nuxtjs/dotenv'
  ],

  axios: {},

  styleResources: {
    scss: [
      '~/assets/scss/main.scss',
    ]
  },

  pwa: {
    manifest: {
      lang: 'en'
    }
  },

  build: {
  }
}
