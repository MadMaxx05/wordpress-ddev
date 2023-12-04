// View your website at your own local server
// for example http://magnite-rebuild.test

// http://localhost:3000 is serving Vite on development
// but accessing it directly will be empty

import { defineConfig, loadEnv, normalizePath } from "vite";
import liveReload from "vite-plugin-live-reload";

import vue from "@vitejs/plugin-vue";
import { basename, join } from "path";

const themeDirName = basename(__dirname);

// https://vitejs.dev/config

export default ({ mode }) => {
  process.env = { ...process.env, ...loadEnv(mode, process.cwd()) };

  return defineConfig({
    plugins: [liveReload(["*.php", "inc/**/*.php", "views/**/*.php"]), vue()],

    root: "",
    base:
      process.env.NODE_ENV === "development"
        ? "/"
        : `/web/app/themes/${themeDirName}/assets/`,

    build: {
      outDir: normalizePath(join(__dirname, "./assets")),
      emptyOutDir: true,
      manifest: true,
      target: "esnext",
      rollupOptions: {
        input: {
          main: normalizePath(
            join(
              __dirname,
              process.env.VITE_ENTRY_POINT
                ? `.${process.env.VITE_ENTRY_POINT}`
                : "./source/main.js"
            )
          ),
        },
        output: {
          assetFileNames: "[name].[hash][extname]",
          entryFileNames: "[name].[hash].js",
          chunkFileNames: "_chunk.[hash].js",
          dir: normalizePath(join(__dirname, "./assets")),
        },
      },
    },

    css: {
      devSourcemap: true,
    },

    server: {
      cors: true,
      strictPort: true,
      port: 3000,
      host: "0.0.0.0",
    },

    resolve: {
      alias: {
        "@": normalizePath(join(__dirname, "node_modules")),
        "@styles": normalizePath(join(__dirname, "./source/css")),
        "@scripts": normalizePath(join(__dirname, "./source/js")),
      },
    },
  });
};
