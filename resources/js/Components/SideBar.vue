

<template>
	<div class="mb-63.992px" >
		<!--Sidebar with Dimmer -->
		<div >
			<!-- Sidebar -->
			<div
				class="absolute flex top-0 h-screen z-20"
				:class="[right ? 'right-0 flex-row' : 'left-0 flex-row-reverse']"
			>
				<!--Drawer -->
				<button
					@click.prevent="toggle()"
					class="w-12 h-48 p-1 my-auto rounded text-white bg-gray-600 text-center focus:outline-none hover:bg-gray-500 transition-color duration-300"
				>
					<span
						:class="[right ? '-rotate-90' : 'rotate-90']"
						class="block transform origin-center font-bold"
					>
						···
					</span>
				</button>

				<!-- Sidebar Content -->
				<div
					ref="content"
					class="transition-all duration-700 bg-slate-200 overflow-hidden flex flex-col items-center justify-start"
					:class="[open ? 'max-w-lg' : 'max-w-0']"
				>
                    <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                    </ResponsiveNavLink>
					<div v-if="$page.props.auth.roles == 'admin'">  
                        <ResponsiveNavLink :href="route('admin.index')" :active="route().current('admin.index')">
                                Vista de usuario
                        </ResponsiveNavLink>
						<ResponsiveNavLink :href="route('admin.index')" :active="route().current('admin.index')">
                                Registrar vehiculo
                        </ResponsiveNavLink>
                    </div>
					<ResponsiveNavLink :href="route('vehiculo.create')" :active="route().current('admin.index')">
                                Lista de vehiculos
                    </ResponsiveNavLink>
					<slot></slot>
				</div>
			</div>

			<transition name="fade">
				<!-- Dimmer -->
				<div
					v-if="dimmer && open"
					@click="toggle()"
					class="flex-1 bg-gray-400 bg-opacity-75 active:outline-none z-10"
				/>
			</transition>
		</div>

		<!-- Page Content -->
		
        <slot name="tema" />
		
	</div>
</template>

<script setup>

import { Inertia } from '@inertiajs/inertia';

import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

</script>

<script>
export default {
	data() {
		return {
			open: false,
			dimmer: true,
			right: false
		};
	},
	methods: {
		toggle() {
			this.open = !this.open;
		}
	}
};
</script>

<style>
html {
	background: #efefef;
}

.fade-enter-active,
.fade-leave-active {
	transition: opacity 1s ease-out;
}

.fade-enter,
.fade-leave-to {
	opacity: 0;
}
</style>
