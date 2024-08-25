document.addEventListener("DOMContentLoaded", () => {
  const buttonElements = document.getElementsByTagName("button");
  Array.from(buttonElements).forEach((buttonElement) => {
    const color = buttonElement.getAttribute("color");
    const size = buttonElement.getAttribute("size");

    const colorClass = getButtonColors(color);
    const sizeClass = getButtonSize(size);

    const defaultClasses = [
      "flex",
      "items-center",
      "gap-2",
      "focus:ring-4",
      "font-medium",
      "text-center",
      "rounded-lg",
      "focus:outline-none",
    ];

    buttonElement.classList.add(...defaultClasses, ...colorClass, ...sizeClass);
  });
});

/**
 *
 * @param {string} color
 * @returns {string}
 */
function getButtonColors(color = null) {
  const colors = {
    primary: [
      "text-white",
      "bg-blue-700",
      "hover:bg-blue-800",
      "focus:ring-blue-300",
      "dark:bg-blue-600",
      "dark:hover:bg-blue-700",
      "dark:focus:ring-blue-800",
    ],
    secondary: [
      "text-white",
      "bg-gray-700",
      "hover:bg-gray-800",
      "focus:ring-gray-300",
      "dark:bg-gray-600",
      "dark:hover:bg-gray-700",
      "dark:focus:ring-gray-800",
    ],
    success: [
      "text-white",
      "bg-green-700",
      "hover:bg-green-800",
      "focus:ring-green-300",
      "dark:bg-green-600",
      "dark:hover:bg-green-700",
      "dark:focus:ring-green-800",
    ],
    danger: [
      "text-white",
      "bg-red-700",
      "hover:bg-red-800",
      "focus:ring-red-300",
      "dark:bg-red-600",
      "dark:hover:bg-red-700",
      "dark:focus:ring-red-800",
    ],
    warning: [
      "text-white",
      "bg-orange-700",
      "hover:bg-orange-800",
      "focus:ring-orange-300",
      "dark:bg-orange-600",
      "dark:hover:bg-orange-700",
      "dark:focus:ring-orange-800",
    ],
    black: [
      "text-white",
      "bg-slate-900",
      "hover:bg-cyan-800",
      "focus:bg-slate-900",
      "dark:bg-slate-900",
      "dark:hover:bg-slate-900",
      "dark:focus:bg-slate-900",
    ],

  };

  return colors[color] ?? colors.primary;
}

function getButtonSize(size = "normal") {
  const sizes = {
    tiny: ["px-3", "py-2", "text-xs"],
    small: ["px-3", "py-2", "text-sm"],
    normal: ["px-5", "py-2.5", "text-sm"],
    large: ["px-5", "py-3", "text-base"],
    extra: ["px-6", "py-3.5", "text-base"],
  };

  return sizes[size] ?? sizes.normal;
}
