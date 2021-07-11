<template>
    <div class="p-3 text-dark">
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="envelope-fill" />
            <b>Địa chỉ email:</b> {{ getUserInfo.email }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="cone-striped" /> 
            <b>Ngày sinh:</b> {{ getUserInfo.birthday || 'Chưa cập nhật' }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="people-fill" />
            <b>Giới tính:</b> {{ getUserInfo.gender || 'Chưa cập nhật' }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="map-fill" />
            <b>Địa chỉ:</b> {{ getUserInfo.address || 'Chưa cập nhật' }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="phone-fill" /> 
            <b>Điện thoại:</b> {{ getUserInfo.phone || 'Chưa cập nhật' }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="calendar-plus-fill" /> 
            <b>Tham gia:</b> {{ moment(getUserInfo.created_at).format("HH:MM - DD/MM/YYYY") }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="clock-fill" />
            <b>Cập nhật lần cuối:</b> {{ moment(getUserInfo.updated_at, "YYYYMMDD").locale('vi').fromNow() }}
        </div>
        <div class="border-bottom p-2 mt-1">
            <b-icon icon="star-fill" />
            <b>Trạng thái:</b>
            <b 
                :class="getUserInfo.deleted_at ? 'text-danger' : 'text-success'"
            >
            {{ getUserInfo.deleted_at ? `Bị cấm` : `Kích hoạt` }}</b>
        </div>
    </div>
</template>

<script>
export default {
    props: ['getUserInfo', 'moment'],
}
</script>