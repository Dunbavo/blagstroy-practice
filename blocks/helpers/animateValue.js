export const animateValue = function (
	obj,
	start = 0,
	end = 100,
	duration = 5000,
	onFinish,
	filterFunction
) {
	if (obj) {
		let startTimestamp = null,
			isFinished = false

		const step = (timestamp) => {
			if (!startTimestamp) startTimestamp = timestamp

			const progress = Math.min(
				(timestamp - startTimestamp) / duration,
				1
			)

			const newValue = Math.floor(progress * (end - start) + start)
			if (filterFunction && typeof filterFunction === 'function') {
				obj.innerHTML = filterFunction(newValue)
			} else {
				obj.innerHTML = newValue
			}

			if (progress < 1) {
				window.requestAnimationFrame(step)
			} else {
				isFinished = true
			}

			if (isFinished && onFinish && typeof onFinish === 'function') {
				window.requestAnimationFrame(onFinish)
			}
		}

		window.requestAnimationFrame(step)
	}
}
