window.addEventListener("load", () => {
  document.querySelectorAll(".navbar_toggle_button").forEach((t) => {
    const n = document.createElement("span");
    t.append(n), t.onclick = () => {
      const e = t.getAttribute("data-target"), a = document.querySelector(e);
      a.classList.toggle("toggled"), t.classList.toggle("toggled"), a.classList.contains("toggled") ? a.style.maxHeight = a.scrollHeight + "px" : a.style.maxHeight = 0;
    };
  });
});
window.addEventListener("load", () => {
  document.querySelectorAll(".slider").forEach((t) => {
    t.getAttribute("data-options"), p(t);
  });
});
const p = (t, n) => {
  const s = {
    width: t.getAttribute("data-width") ? t.getAttribute("data-width") : 360,
    height: t.getAttribute("data-height") ? t.getAttribute("data-height") : 240
  };
  t.style.height = s.height + "px", t.style.width = s.width + "px";
  const i = document.createElement("div");
  i.classList.add("slider_viewport"), t.append(i), t.querySelectorAll("img").forEach((g) => {
    const c = document.createElement("div");
    c.classList.add("slider_slide"), c.append(g), i.append(c);
  });
  const d = document.createElement("div");
  d.classList.add("slider_nav"), t.append(d);
  const r = document.createElement("button");
  r.classList.add("slider_nav_prev"), r.innerHTML = "", r.addEventListener("click", () => {
    l(-1, t);
  }), d.append(r);
  const o = document.createElement("button");
  o.classList.add("slider_nav_next"), o.innerHTML = "", o.addEventListener("click", () => {
    l(1, t);
  }), d.append(o);
}, l = (t, n) => {
  let e = Number(
    n.getAttribute("data-current") ? n.getAttribute("data-current") : 0
  );
  e += t;
  const s = n.querySelectorAll(".slider_slide").length;
  e = e % s, e = e >= 0 ? e : s + e, n.setAttribute("data-current", e);
  const i = e * -100 + "%", d = n.querySelector(".slider_viewport");
  d.style.left = i, d.addEventListener("transitonend", u), d.removeEventListener("transitonend", u);
}, u = () => {
};
