import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
	build: {
		lib: {
			entry: path.resolve(__dirname, "./src/js/main.js"),
			name: "IW2",
			formats: ["es"],
		},
		rollupOptions: {
			output: {
				entryFileNames: "js/[name].js",
				assetFileNames: ({ name }) => {
					if (/\.(gif|jpe?g|png|svg)$/.test(name ?? "")) {
						return "images/[name][extname]";
					}
					if (/\.css$/.test(name ?? "")) {
						return "css/[name][extname]";
					}
					return "assets/[name]-[hash][extname]";
				},
			},
		},
	},
});
