# AI Agent Instructions for Zinvos

## 1. Context-First Execution (Mandatory)

Before conducting broad project searches, scanning directories, or reading multiple files:
- **Consult `docs/PROJECT_CONTEXT.md` first.** It contains verified persistent architectural knowledge including the active theme, CPTs, database fields, templates, hooks, and frontend conventions.
- Do not perform recursive scans of `wp-content/`, `wp-includes/`, `wp-admin/`, `node_modules/`, or upload directories.
- Inspect only files specifically relevant to the task at hand.

## 2. Active Theme & Directory Guidelines

- **Active Theme**: `wp-content/themes/zinvos-v2/` is the active production theme. All theme modifications must target `zinvos-v2`.
- **Legacy Theme**: `wp-content/themes/zinvos/` is the legacy v1 theme. Do not modify it unless explicitly instructed.
- **No Build Tools**: There is no Webpack, Vite, or npm build step. CSS is directly edited in `style.css` and JavaScript in `js/script.js`.

## 3. Persistent Knowledge Maintenance

- Consult `docs/PROJECT_CONTEXT.md` at the start of any new task.
- Update `docs/PROJECT_CONTEXT.md` only when significant architectural changes are made (e.g., registering new CPTs, modifying major routing, or adding external integrations).
- Never commit or document sensitive credentials, passwords, or salts.
