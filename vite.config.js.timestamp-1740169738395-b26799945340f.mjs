// vite.config.js
import { defineConfig } from "file:///C:/xampp/htdocs/atalaya/node_modules/vite/dist/node/index.js";
import laravel from "file:///C:/xampp/htdocs/atalaya/node_modules/laravel-vite-plugin/dist/index.js";
import glob from "file:///C:/xampp/htdocs/atalaya/node_modules/glob/glob.js";
var vite_config_default = defineConfig({
  server: {
    watch: {
      ignored: ["!**/node_modules/your-package-name/**"]
    }
  },
  plugins: [
    laravel({
      input: [
        ...glob.sync("resources/js/*.jsx"),
        "resources/css/app.css"
      ],
      refresh: true
    })
  ],
  resolve: (name) => {
    const pages = import.meta.glob("./Pages/**/*.jsx", { eager: true });
    return pages[`./Pages/${name}.jsx`];
  },
  build: {
    rollupOptions: {
      output: {
        assetFileNames: (assetInfo) => {
          if (assetInfo.name == "app-C6GHMxSp.css")
            return "app.css";
          return assetInfo.name;
        }
      }
    }
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFx4YW1wcFxcXFxodGRvY3NcXFxcYXRhbGF5YVwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiQzpcXFxceGFtcHBcXFxcaHRkb2NzXFxcXGF0YWxheWFcXFxcdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0M6L3hhbXBwL2h0ZG9jcy9hdGFsYXlhL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcbmltcG9ydCBnbG9iIGZyb20gJ2dsb2InO1xuXG5leHBvcnQgZGVmYXVsdCBkZWZpbmVDb25maWcoe1xuICAgIHNlcnZlcjoge1xuICAgICAgICB3YXRjaDoge1xuICAgICAgICAgICAgaWdub3JlZDogWychKiovbm9kZV9tb2R1bGVzL3lvdXItcGFja2FnZS1uYW1lLyoqJ10sXG4gICAgICAgIH1cbiAgICB9LFxuICAgIHBsdWdpbnM6IFtcbiAgICAgICAgbGFyYXZlbCh7XG4gICAgICAgICAgICBpbnB1dDogW1xuICAgICAgICAgICAgICAgIC4uLmdsb2Iuc3luYygncmVzb3VyY2VzL2pzLyouanN4JyksXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3MvYXBwLmNzcycsXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICAgICAgfSksXG4gICAgXSxcbiAgICByZXNvbHZlOiBuYW1lID0+IHtcbiAgICAgICAgY29uc3QgcGFnZXMgPSBpbXBvcnQubWV0YS5nbG9iKCcuL1BhZ2VzLyoqLyouanN4JywgeyBlYWdlcjogdHJ1ZSB9KVxuICAgICAgICByZXR1cm4gcGFnZXNbYC4vUGFnZXMvJHtuYW1lfS5qc3hgXVxuICAgIH0sXG4gICAgYnVpbGQ6IHtcbiAgICAgICAgcm9sbHVwT3B0aW9uczoge1xuICAgICAgICAgICAgb3V0cHV0OiB7XG4gICAgICAgICAgICAgICAgYXNzZXRGaWxlTmFtZXM6IChhc3NldEluZm8pID0+IHtcbiAgICAgICAgICAgICAgICAgICAgaWYgKGFzc2V0SW5mby5uYW1lID09ICdhcHAtQzZHSE14U3AuY3NzJylcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiAnYXBwLmNzcyc7XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiBhc3NldEluZm8ubmFtZTtcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgfSxcbiAgICAgICAgfSxcbiAgICB9LFxufSk7XG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQStQLFNBQVMsb0JBQW9CO0FBQzVSLE9BQU8sYUFBYTtBQUNwQixPQUFPLFVBQVU7QUFFakIsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDeEIsUUFBUTtBQUFBLElBQ0osT0FBTztBQUFBLE1BQ0gsU0FBUyxDQUFDLHVDQUF1QztBQUFBLElBQ3JEO0FBQUEsRUFDSjtBQUFBLEVBQ0EsU0FBUztBQUFBLElBQ0wsUUFBUTtBQUFBLE1BQ0osT0FBTztBQUFBLFFBQ0gsR0FBRyxLQUFLLEtBQUssb0JBQW9CO0FBQUEsUUFDakM7QUFBQSxNQUNKO0FBQUEsTUFDQSxTQUFTO0FBQUEsSUFDYixDQUFDO0FBQUEsRUFDTDtBQUFBLEVBQ0EsU0FBUyxVQUFRO0FBQ2IsVUFBTSxRQUFRLFlBQVksS0FBSyxvQkFBb0IsRUFBRSxPQUFPLEtBQUssQ0FBQztBQUNsRSxXQUFPLE1BQU0sV0FBVyxJQUFJLE1BQU07QUFBQSxFQUN0QztBQUFBLEVBQ0EsT0FBTztBQUFBLElBQ0gsZUFBZTtBQUFBLE1BQ1gsUUFBUTtBQUFBLFFBQ0osZ0JBQWdCLENBQUMsY0FBYztBQUMzQixjQUFJLFVBQVUsUUFBUTtBQUNsQixtQkFBTztBQUNYLGlCQUFPLFVBQVU7QUFBQSxRQUNyQjtBQUFBLE1BQ0o7QUFBQSxJQUNKO0FBQUEsRUFDSjtBQUNKLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
