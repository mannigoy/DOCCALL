
document.addEventListener("DOMContentLoaded", function () {
  // Initialize ECharts for Appointments Overview
  const appointmentsChart = echarts.init(
    document.getElementById("appointmentsChart"),
  );
  const appointmentsOption = {
    animation: false,
    tooltip: {
      trigger: "axis",
      backgroundColor: "rgba(255, 255, 255, 0.9)",
      borderColor: "#e2e8f0",
      borderWidth: 1,
      textStyle: {
        color: "#1f2937",
      },
    },
    grid: {
      left: "3%",
      right: "4%",
      bottom: "3%",
      top: "3%",
      containLabel: true,
    },
    xAxis: {
      type: "category",
      boundaryGap: false,
      data: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisLine: {
        lineStyle: {
          color: "#e2e8f0",
        },
      },
      axisLabel: {
        color: "#1f2937",
      },
    },
    yAxis: {
      type: "value",
      axisLine: {
        show: false,
      },
      axisTick: {
        show: false,
      },
      splitLine: {
        lineStyle: {
          color: "#e2e8f0",
        },
      },
      axisLabel: {
        color: "#1f2937",
      },
    },
    series: [
      {
        name: "Appointments",
        type: "line",
        smooth: true,
        symbol: "none",
        lineStyle: {
          width: 3,
          color: "rgba(87, 181, 231, 1)",
        },
        areaStyle: {
          color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
            {
              offset: 0,
              color: "rgba(87, 181, 231, 0.2)",
            },
            {
              offset: 1,
              color: "rgba(87, 181, 231, 0.05)",
            },
          ]),
        },
        data: [8, 12, 15, 9, 11, 5, 3],
      },
      {
        name: "Completed",
        type: "line",
        smooth: true,
        symbol: "none",
        lineStyle: {
          width: 3,
          color: "rgba(141, 211, 199, 1)",
        },
        areaStyle: {
          color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [
            {
              offset: 0,
              color: "rgba(141, 211, 199, 0.2)",
            },
            {
              offset: 1,
              color: "rgba(141, 211, 199, 0.05)",
            },
          ]),
        },
        data: [7, 10, 12, 8, 9, 4, 2],
      },
    ],
  };
  appointmentsChart.setOption(appointmentsOption);
  // Initialize ECharts for Specialties Chart
  const specialtiesChart = echarts.init(
    document.getElementById("specialtiesChart"),
  );
  const specialtiesOption = {
    animation: false,
    tooltip: {
      trigger: "item",
      backgroundColor: "rgba(255, 255, 255, 0.9)",
      borderColor: "#e2e8f0",
      borderWidth: 1,
      textStyle: {
        color: "#1f2937",
      },
    },
    legend: {
      orient: "vertical",
      right: 10,
      top: "center",
      textStyle: {
        color: "#1f2937",
      },
    },
    series: [
      {
        name: "Appointments",
        type: "pie",
        radius: ["45%", "70%"],
        center: ["40%", "50%"],
        avoidLabelOverlap: false,
        itemStyle: {
          borderRadius: 8,
          borderColor: "#fff",
          borderWidth: 2,
        },
        label: {
          show: false,
        },
        emphasis: {
          label: {
            show: false,
          },
        },
        labelLine: {
          show: false,
        },
        data: [
          {
            value: 28,
            name: "Cardiology",
            itemStyle: { color: "rgba(87, 181, 231, 1)" },
          },
          {
            value: 22,
            name: "Neurology",
            itemStyle: { color: "rgba(141, 211, 199, 1)" },
          },
          {
            value: 18,
            name: "Orthopedics",
            itemStyle: { color: "rgba(251, 191, 114, 1)" },
          },
          {
            value: 15,
            name: "Dermatology",
            itemStyle: { color: "rgba(252, 141, 98, 1)" },
          },
          { value: 12, name: "Pediatrics", itemStyle: { color: "#a3a1fb" } },
          { value: 5, name: "Others", itemStyle: { color: "#e2e8f0" } },
        ],
      },
    ],
  };
  specialtiesChart.setOption(specialtiesOption);
  // Resize charts when window is resized
  window.addEventListener("resize", function () {
    appointmentsChart.resize();
    specialtiesChart.resize();
  });
  // Navigation functionality
  const navLinks = document.querySelectorAll("nav a");
  const sections = document.querySelectorAll("main > div[id]");
  const header = document.querySelector("header h1");
  navLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetId = this.getAttribute("href").substring(1);
      // Update active navigation
      navLinks.forEach((navLink) => {
        navLink.classList.remove("bg-primary", "text-white");
        navLink.classList.add(
          "text-slate-300",
          "hover:bg-slate-800",
          "hover:text-white",
        );
      });
      this.classList.remove(
        "text-slate-300",
        "hover:bg-slate-800",
        "hover:text-white",
      );
      this.classList.add("bg-primary", "text-white");
      // Update visible section
      sections.forEach((section) => {
        section.classList.add("hidden");
      });
      document.getElementById(targetId).classList.remove("hidden");
      // Update header title
      header.textContent = this.querySelector("span").textContent;
    });
  });
  // Delete modal functionality
  const deleteButtons = document.querySelectorAll(
    "button:not(#cancelDelete):not(#confirmDelete)",
  );
  const deleteModal = document.getElementById("deleteModal");
  const cancelDelete = document.getElementById("cancelDelete");
  const confirmDelete = document.getElementById("confirmDelete");
  deleteButtons.forEach((button) => {
    if (
      button.textContent.trim() === "Delete" ||
      button.textContent.trim() === "Cancel"
    ) {
      button.addEventListener("click", function () {
        deleteModal.classList.remove("hidden");
      });
    }
  });
  cancelDelete.addEventListener("click", function () {
    deleteModal.classList.add("hidden");
  });
  confirmDelete.addEventListener("click", function () {
    // Here you would add the actual delete functionality
    deleteModal.classList.add("hidden");
    // Show a success notification or update the UI
  });
  // Close modal when clicking outside
  deleteModal.addEventListener("click", function (e) {
    if (e.target === deleteModal) {
      deleteModal.classList.add("hidden");
    }
  });
});
