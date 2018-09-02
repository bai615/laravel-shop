// 从刚刚安装的库中加载数据
const addressData = require('china-area-data/v3/data');
// 引入 lodash，lodash 是一个实用工具库，提供了很多常用的方法
import _ from 'lodash';

// 注册一个名为 select-district 的 Vue 组件
Vue.component('select-district', {
    // 定义组件属性
    props: {
        // 用来初始化省市区的值，在编辑时会用到
        initValue: {
            type: Array, // 格式是数组
            default: () => ([]), // 默认是个空数组
        }
    },
    // 定义了这个组件内的数据
    data () {
        return {
            provinces: addressData['86'], // 省列表
            cities: {}, // 城市列表
            districts: {}, // 地区列表
            provinceId: '', // 当前选中的省
            cityId: '', // 当前选中的市
            districtId: '', // 当前选中的区
        };
    },
    // 定义观察器，对应属性变更时会触发对应的观察器函数
    watch: {
        // 当选择的省发生改变时触发
        provinceId(newVal) {
            if(!newVal) {
                this.cities = {};
                this.cityId = '';
                return;
            }
            // 将城市列表设为当前省下的城市
            this.cities = addressData[newVal];
            // 如果当前选中的城市不在当前省下，则将选中城市清空
            if(!this.cities[this.cityId]) {
                this.cityId = '';
            }
        },
        // 当选择的市发生改变时触发
        cityId(newVal){
            if(!newVal){
                this.districts = {};
                this.districtId = '';
                return;
            }
            // 将地区列表设为当前城市下的地区
            this.districts = addressData[newVal];
            // 如果当前选中的地区不在当前城市下，则将选中地区清空
            if(!this.districts[this.districtId]){
                this.districtId = '';
            }
        },
        // 组件初始化时会调用这个方法
        created () {
            this.setFromValue(this.initValue);
        }
    }
});