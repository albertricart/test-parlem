export function useFormatDate(dateString){
	let date = new Date(dateString);
	const options = {
		day: "numeric",
		month: "numeric",
		year: "numeric"
	}
	return date.toLocaleDateString('es-ES', options);
}