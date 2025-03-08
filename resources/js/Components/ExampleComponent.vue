<template>
	<div class="container">
		<select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
			<optgroup class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
				<option>Select option</option>
				<option value="facility-decommissioning">Facility Decommisioning</option>
				<option value="data-center-decommissioning">Data Center Decommissioning</option>
				<option value="office-furniture">Office Furniture</option>
				<option value="data-destruction">Data Destruction</option>
				<option value="asset-recovery">Asset Recovery</option>
				<option value="asset-management">Asset Management</option>
				<option value="recycling">Recycling</option>
				<option value="generator-removal">Generator Removal</option>
				<option value="industrial-removal">Industrial Removal</option>
			</optgroup>
			
		</select>
	</div>
</template>
<script>
	export default {
		mounted () {
			console.log('example component is mounted');
		}
	}
</script>