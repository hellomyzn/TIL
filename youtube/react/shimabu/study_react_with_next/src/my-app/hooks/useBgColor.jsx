"use client";

import { useEffect, useMemo } from "react";
import { usePathname } from "next/navigation";

export const useBgColor = () => {
  const pathname = usePathname();
  const bgColor = useMemo(() => {
    switch (pathname) {
      case "/":
        return "navy";
      case "/about":
        return "lightblue";
      default:
        return "";
    }
  }, [pathname]);

  useEffect(() => {
    document.body.style.backgroundColor = bgColor;
    return () => {
      document.body.style.backgroundColor = "";
    };
  }, [bgColor]);
};
